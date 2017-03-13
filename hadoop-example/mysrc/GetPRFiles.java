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

public class GetPRFiles
{

	public static class Map extends Mapper<LongWritable, Text, Text, Text> {
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
				
			}
			// indicates a well-formedness error error
			catch (ParsingException ex) { 
				System.out.println("Not well-formed.");
				System.out.println(ex.getMessage());
			}  
			catch (IOException ex) {
				System.out.println("io exception");
			}
			
			context.write(new Text(strId), new Text(strBody));
		}
	}

	public static class Reduce extends Reducer<Text, Text, Text, Text> {
		
		public void reduce(Text key, Iterable<Text> values, Context context)
				throws IOException, InterruptedException {


			for (Text value : values) {
				context.write(key, new Text(""));

			}
		}
	}

	public static void main(String[] args) throws Exception
	{
		Configuration conf = new Configuration();

		conf.set("xmlinput.start", "<eecs485_article>");
		conf.set("xmlinput.end", "</eecs485_article>");

		Job job = new Job(conf, "XmlParser");

		job.setOutputKeyClass(Text.class);
		job.setOutputValueClass(Text.class);

		job.setMapperClass(Map.class);
		job.setReducerClass(Reduce.class);

		job.setInputFormatClass(XmlInputFormat.class);
		job.setOutputFormatClass(TextOutputFormat.class);

		FileInputFormat.addInputPath(job, new Path(args[0]));
		FileOutputFormat.setOutputPath(job, new Path(args[1]));

		job.waitForCompletion(true);
	}
}
