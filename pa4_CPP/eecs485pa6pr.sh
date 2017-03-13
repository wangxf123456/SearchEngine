cd ./hadoop-example/mysrc
make PR
./PRInput.sh
cp pagerank_input.txt ../../pagerank/pagerank_input.txt
make clean
cd ../../pagerank
make
mkdir ../proutput
./eecs485pa5p 0.85 -k 10 pagerank_input.txt ../proutput/output.txt