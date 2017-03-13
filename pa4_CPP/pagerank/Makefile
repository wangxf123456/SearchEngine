FLAGS = -Wall -Wextra -pedantic -Wvla -Wconversion -std=c++11 -O3

release: all

debug: FLAGS += -g
debug: all

all: page

page: eecs485pa5p.cpp
	g++ $(FLAGS) eecs485pa5p.cpp -o eecs485pa5p

clean:
	rm -f *.o eecs485pa5p