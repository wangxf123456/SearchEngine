#ifndef INDEX_SERVER_H
#define INDEX_SERVER_H

#include <iosfwd>
#include <stdint.h>
#include <string>
#include <vector>

struct Query_hit {
    Query_hit(const char *id_, double score_)
        : id(id_), score(score_)
        {}

    const char *id;
    double score;
};

struct DataInfo{
	// DataInfo(std::string word_, double idf_, int totalOccur_, int docID_, int tf_, double nf_)
	// : word(word_), idf(idf_), totalOccur(totalOccur_), docID(docID_), tf(tf_), nf(nf_)
	// {}
	std::string word;
	double idf;
	int totalOccur;
	double score;
	std::string docID;
	int tf;
	int df;
	double nf;
	double page_rank;
};

class Index_server {
public:
    void run(int port);

    // Methods that students must implement.
    void init(std::ifstream& infile1, std::ifstream& infile2);
    void process_query(const std::string& query, std::vector<Query_hit>& hits, double w);
};

#endif

