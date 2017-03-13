package edu.umich.cse.eecs485;

import java.io.IOException;
import java.util.*;

import org.apache.hadoop.fs.Path;
import org.apache.hadoop.conf.*;
import org.apache.hadoop.io.*;
import org.apache.hadoop.mapreduce.*;
import org.apache.hadoop.mapreduce.lib.input.FileInputFormat;
import org.apache.hadoop.mapreduce.lib.input.TextInputFormat;
import org.apache.hadoop.mapreduce.lib.output.FileOutputFormat;
import org.apache.hadoop.mapreduce.lib.output.TextOutputFormat;

import java.lang.Math;

public class NormalFactor {

	public static class Map extends Mapper<LongWritable, Text, Text, Text> {

		public void map(LongWritable key, Text value, Context context) throws IOException, InterruptedException {
			String line = value.toString();
			StringTokenizer tokenizer = new StringTokenizer(line);

			String word = tokenizer.nextToken();
			String totalFile = tokenizer.nextToken();
			String idf = tokenizer.nextToken();

			String file = "";
			String tf = "";
			
			while (tokenizer.hasMoreTokens()) {

				file = tokenizer.nextToken();
				tf = tokenizer.nextToken();

				double idfNum = Double.parseDouble(idf);
				int tfNum = Integer.parseInt(tf);

				double nf = Math.pow(idfNum,2) * Math.pow(tfNum,2);
				context.write(new Text(file), new Text(String.valueOf(nf)));
			}
		}
	} 

	public static class Reduce extends Reducer<Text, Text, Text, Text> {

		public void reduce(Text key, Iterable<Text> values, Context context) 
			throws IOException, InterruptedException {

			double sum = 0;
			for (Text val : values) {

				sum += Double.parseDouble(val.toString());
			}
			context.write(key, new Text(String.valueOf(sum)));
		}
	}

	public static void main(String[] args) throws Exception {
		Configuration conf = new Configuration();

		Job job = new Job(conf, "wordcount");

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
