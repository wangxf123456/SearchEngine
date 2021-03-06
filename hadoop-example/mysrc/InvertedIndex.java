package edu.umich.cse.eecs485;

import java.io.IOException;

import org.apache.hadoop.conf.Configuration;
import org.apache.hadoop.fs.Path;
import org.apache.hadoop.io.LongWritable;
import org.apache.hadoop.io.Text;
import org.apache.hadoop.mapreduce.Job;
import org.apache.hadoop.mapreduce.Mapper;
import org.apache.hadoop.mapreduce.Reducer;
import org.apache.hadoop.mapreduce.lib.input.FileInputFormat;
import org.apache.hadoop.mapreduce.lib.output.FileOutputFormat;
import org.apache.hadoop.mapreduce.lib.output.TextOutputFormat;
import org.apache.mahout.classifier.bayes.XmlInputFormat;
import java.util.HashSet;
import java.util.HashMap;
import java.util.Map.Entry;
import nu.xom.*;
import java.util.Iterator;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

import java.io.IOException;
import java.io.File;
import java.util.Scanner;
import java.lang.Math;

public class InvertedIndex
{

	public static int totalFile; 
	public static HashSet<String> stopWord;

	public static class Map extends Mapper<LongWritable, Text, Text, LongWritable> {
		public void map(LongWritable key, Text value, Context context)
				throws IOException, InterruptedException {

			String strId = "";
			String strBody = "";

			// Parse the xml and read data (page id and article body)
			// Using XOM library
			Builder builder = new Builder();

			try {
//				System.out.println(value.toString());
				Document doc = builder.build(value.toString(), null);

				Nodes nodeId = doc.query("//eecs485_article_id");
				strId = nodeId.get(0).getChild(0).getValue();
				
				Nodes nodeBody = doc.query("//eecs485_article_body");
				strBody = nodeBody.get(0).getChild(0).getValue();
			}
			// indicates a well-formedness error
			catch (ParsingException ex) { 
				System.out.println("Not well-formed.");
				System.out.println(ex.getMessage());
			}  
			catch (IOException ex) {
				System.out.println("io exception");
			}
			
			// Tokenize document body
			Pattern pattern = Pattern.compile("\\w+");
			Matcher matcher = pattern.matcher(strBody);
			
			while (matcher.find()) {
				// Write the parsed token
				String keyString = matcher.group().toLowerCase();
				if(!stopWord.contains(keyString)){
					context.write(new Text(keyString), new LongWritable(Integer.valueOf(strId)));
				}
			}
		}
	}

	public static class Reduce extends Reducer<Text, LongWritable, Text, Text> {
		
		public void reduce(Text key, Iterable<LongWritable> values, Context context)
				throws IOException, InterruptedException {
			
			//get the file list
			HashMap<String,Integer> map = new HashMap<String,Integer>();
			for (LongWritable value : values) {
				String pagid = String.valueOf(value.get());

				if(map.containsKey(pagid)){
					int temp = map.get(pagid);
					temp++;
					map.put(pagid, temp);

				}else{
					map.put(pagid, 1);
				}

			}

			//calculate idf
			double idf = Math.log10((double) totalFile/(double)map.size());

			
			// Convert the contents of the set into a list
			String invList = "";
			invList += map.size() + " " + idf;
			
			for (String keyValue : map.keySet()){

			    invList +=" " + keyValue + " " + map.get(keyValue);
			}
			
			context.write(key, new Text(invList));
		}
	}

	public static void main(String[] args) throws Exception
	{
		Configuration conf = new Configuration();

		//get the total file
		File f = new File("output/fileCount/part-r-00000");
		Scanner sc = new Scanner(f);
		totalFile = Integer.parseInt(sc.next());
		sc.close();

		//get the stop Word;
		stopWord = new HashSet<String>();
		File stopf = new File("../../pa4_CPP/stop_words.txt");
		Scanner stopSC = new Scanner(stopf);
		while(stopSC.hasNext()){
			stopWord.add(stopSC.next());
		}

		conf.set("xmlinput.start", "<eecs485_article>");
		conf.set("xmlinput.end", "</eecs485_article>");

		Job job = new Job(conf, "XmlParser");

		job.setOutputKeyClass(Text.class);
		job.setOutputValueClass(LongWritable.class);

		job.setMapperClass(Map.class);
		job.setReducerClass(Reduce.class);

		job.setInputFormatClass(XmlInputFormat.class);
		job.setOutputFormatClass(TextOutputFormat.class);

		FileInputFormat.addInputPath(job, new Path(args[0]));
		FileOutputFormat.setOutputPath(job, new Path(args[1]));

		job.waitForCompletion(true);
	}
}
