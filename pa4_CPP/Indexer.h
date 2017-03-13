#ifndef INDEXER_H
#define INDEXER_H

#include <iosfwd>
#include <sstream>
#include <string>
#include <iostream>
#include <vector>
#include <algorithm>
#include <cmath>
#include <unordered_map>

class Indexer {
public:
    void index(std::ifstream& content, std::ostream& outfile);
};

struct occurance {
	int num;
	double factor;
};

struct word_data {
	double idf;
	int total;
	std::unordered_map <int, occurance> occur;
};

#endif

