cd hadoop-example/mysrc
make clean
make PR
./PRInput.sh
cp pagerank_input.txt ../../pa4_CPP/pagerank/pagerank_input.txt
make clean
cd ../../pa4_CPP/pagerank
make
rm -r ../../proutput 
mkdir ../../proutput
./eecs485pa5p 0.85 -k 10 pagerank_input.txt ../../proutput/output.txt
