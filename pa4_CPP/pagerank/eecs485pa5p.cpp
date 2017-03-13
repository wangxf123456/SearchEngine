#include <iostream>
#include <fstream>
#include <sstream>
#include <unordered_map>
#include <vector>
#include <cmath>
using namespace std;

struct node_data {
	int out_edge_num;
	double page_rank;
	vector<int> in_node;
};

int main(int argc, char* argv[]) {
	if (argc != 6) {
		cout << "error use" << endl;
		exit(-1);
	}

	double dvalue = atof(argv[1]);
	int num_iter = -1;
	double maxchange = -1;

	string temp = argv[2];
	if (temp == "-k") {
		num_iter = atoi(argv[3]);
	} else if (temp == "-converge") {
		maxchange = atof(argv[3]);
	} else {
		cout << "error use" << endl;
		exit(-1);
	}

	ifstream input;
	string input_file = argv[4];
	string output_file = argv[5];

	ofstream fout(output_file);
	input.open(input_file);

	unordered_map<int, node_data> data;
	int edge_flag = 0;

	//read in the graph data
	while(input.good()) {
		string tempString;
		getline(input, tempString);
		if (tempString.length() <= 1) {
			break;
		}

		if (tempString[0] == '*') {
			edge_flag++;
			continue;
		}
		istringstream tempStringStream(tempString);
		if (edge_flag >= 1) {
			int source_id, target_id;
			tempStringStream >> source_id >> target_id;
			if (source_id == target_id) {
				continue;
			}
			data[target_id].in_node.push_back(source_id);
			data[source_id].out_edge_num++;
		} else {
			int id;
			tempStringStream >> id;
			data[id];
		}
	}

	input.close();

	int size = int(data.size());
	vector<int> sink_node;
	for (auto& x: data) {
		x.second.page_rank = 1.0 / size;
		if (x.second.out_edge_num == 0) {
			sink_node.push_back(x.first);
		}
	}

	//process the data
	int sink_size = int(sink_node.size());
	if (num_iter > -1) {
		for (int i = 0; i < num_iter; ++i) {
			unordered_map<int, double> last_page_rank;
			double sink_page_rank = 0;
			for (auto& x: data) {
				last_page_rank[x.first] = x.second.page_rank;
				if (x.second.out_edge_num == 0) {
					sink_page_rank += x.second.page_rank;
				}
			}
			for (auto& x: data) {
				double total = 0;
				for (auto& y: x.second.in_node) {
					total += last_page_rank[y] / double(data[y].out_edge_num);
				}
				if (sink_size > 0) {
					if (x.second.out_edge_num == 0) {
						total += (sink_page_rank - last_page_rank[x.first]) / double(size - 1);
					} else {
						total += sink_page_rank / double(size - 1);
					}				
				}

				total *= dvalue;
				x.second.page_rank = (1 - dvalue) / size + total;
			}
		}
	} else {
		while (true) {
			bool div_flag = false;
			unordered_map<int, double> last_page_rank;
			double sink_page_rank = 0;
			for (auto& x: data) {
				last_page_rank[x.first] = x.second.page_rank;
				if (x.second.out_edge_num == 0) {
					sink_page_rank += x.second.page_rank;
				}
			}
			for (auto& x: data) {
				double total = 0;
				for (auto& y: x.second.in_node) {
					total += last_page_rank[y] / double(data[y].out_edge_num);
				}
				if (sink_size > 0) {
					if (x.second.out_edge_num == 0) {
						total += (sink_page_rank - last_page_rank[x.first]) / double(size - 1);
					} else {
						total += sink_page_rank / double(size - 1);
					}				
				}

				total *= dvalue;
				x.second.page_rank = (1 - dvalue) / size + total;
				if (abs(last_page_rank[x.first]- x.second.page_rank) / last_page_rank[x.first]
					 > maxchange) {
					div_flag = true;
				}
			}	

			if (!div_flag) {
				break;
			}	
		}	
	}

	//output page rank
	ostringstream os;
	for (auto& x: data) {
		char buffer[100];
		sprintf(buffer, "%d,%.4e\n", x.first, x.second.page_rank);
		os << buffer;
		//os << x.first << ',' << x.second.page_rank << '\n';
	}

	fout << os.str();
}
