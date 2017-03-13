all: invindex FileCount PRInput PRInputFile NormalFactor FinalCal

PR: PRInputFile PRInput

IN: FileCount invindex NormalFactor FinalCal

invindex:
	javac -cp .:../hadoop-core-1.0.1.jar:../lib/* -d bin InvertedIndex.java XmlInputFormat.java
	jar -cvf ./InvertedIndex.jar -C bin/ .

FileCount:
	javac -cp .:../hadoop-core-1.0.1.jar:../lib/* -d bin FileCount.java XmlInputFormat.java
	jar -cvf ./FileCount.jar -C bin/ .

NormalFactor:
	javac -cp .:../hadoop-core-1.0.1.jar:../lib/* -d bin NormalFactor.java XmlInputFormat.java
	jar -cvf ./NormalFactor.jar -C bin/ .

FinalCal:
	javac -cp .:../hadoop-core-1.0.1.jar:../lib/* -d bin FinalCal.java XmlInputFormat.java
	jar -cvf ./FinalCal.jar -C bin/ .

PRInput:
	javac -cp .:../hadoop-core-1.0.1.jar:../lib/* -d bin GetPRIn.java XmlInputFormat.java
	jar -cvf ./GetPRIn.jar -C bin/ .

PRInputFile:
	javac -cp .:../hadoop-core-1.0.1.jar:../lib/* -d bin GetPRFiles.java XmlInputFormat.java
	jar -cvf ./GetPRFiles.jar -C bin/ .

xom:
	javac -cp .:../hadoop-core-1.0.1.jar:../lib/* -d bin XOMtest.java
	java -Xms1024m -Xmx1024m -cp .:../lib/*:bin/ edu.umich.cse.eecs485.XOMtest

clean:
	rm -rf *.jar bin/* output
