#!/bin/bash

export JAVA_HOME=/usr

../bin/hadoop jar GetPRIn.jar edu.umich.cse.eecs485.GetPRIn ../dataset/mining.edges.xml output/GetPRIn
../bin/hadoop jar GetPRFiles.jar edu.umich.cse.eecs485.GetPRFiles ../dataset/mining.articles.xml output/GetPRFiles
touch rubbish.txt
echo "***" > rubbish.txt
cat output/GetPRFiles/* rubbish.txt output/GetPRIn/* >pagerank_input.txt
rm rubbish.txt
