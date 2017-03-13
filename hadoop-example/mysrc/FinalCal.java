package edu.umich.cse.eecs485;

import java.io.IOException;
import java.util.*;
import java.io.*;
import java.lang.Number;

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
import org.apache.hadoop.mapreduce.lib.input.TextInputFormat;
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

public class FinalCal
{

	public static HashMap<String, Double> nfContainer;

	public static class Map extends Mapper<LongWritable, Text, Text, Text> {
		public void map(LongWritable key, Text value, Context context)
				throws IOException, InterruptedException {

			String line = value.toString();
			StringTokenizer tokenizer = new StringTokenizer(line);
			String word = tokenizer.nextToken();
			String totalFile = tokenizer.nextToken();
			String idf = tokenizer.nextToken();

			String file = "";
			String tf = "";
			
			while (tokenizer.hasMoreTokens()){

				file = tokenizer.nextToken();
				tf = tokenizer.nextToken();

				double idfNum = Double.parseDouble(idf);
				int tfNum = Integer.parseInt(tf);
				double nf = nfContainer.get(file);

				double score = tfNum * idfNum / Math.sqrt(nf);
				
				String result = totalFile + " " + file + ":" + String.format("%.4e", score);
				context.write(new Text(word), new Text(result));
			}
		}
	}

	public static class Reduce extends Reducer<Text, Text, Text, Text> {
		
		public void reduce(Text key, Iterable<Text> values, Context context)
				throws IOException, InterruptedException {
			
			String result = "";
			for (Text value : values) {
				int firstSpace = value.toString().indexOf(" ");
				String totalFile = value.toString().substring(0,firstSpace);
				if(result == ""){
					result += totalFile;
				}

				result += " " + value.toString().substring(firstSpace,value.toString().length());

			}

			context.write(key, new Text(result));
		}
	}

	public static void main(String[] args) throws Exception
	{
		Configuration conf = new Configuration();

		//get the total file
		nfContainer = new HashMap<String, Double>();
		File f = new File("output/NormalFactor/part-r-00000");
		Scanner sc = new Scanner(f);
		while(sc.hasNext()){
			String file = sc.next();
			double nf = Double.parseDouble(sc.next());
			nfContainer.put(file,nf);
		}
		sc.close();

		Job job = new Job(conf, "XmlParser");

		job.setOutputKeyClass(Text.class);
		job.setOutputValueClass(Text.class);

		job.setMapperClass(Map.class);
		job.setReducerClass(Reduce.class);

		job.setInputFormatClass(TextInputFormat.class);
		job.setOutputFormatClass(TextOutputFormat.class);

		FileInputFormat.addInputPath(job, new Path(args[0]));
		FileOutputFormat.setOutputPath(job, new Path(args[1]));

		job.waitForCompletion(true);
	}
}
