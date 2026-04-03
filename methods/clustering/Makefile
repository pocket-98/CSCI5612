# Makefile for generating python outputs from scripts

PYTHON := /usr/bin/python3
SCRIPTS := code_showcols.py code_kmeans.py code_hierarchy.py code_dbscan.py
OUTPUTS = $(patsubst %.py,%.txt, $(filter %.py,$(SCRIPTS)))

.PHONY: all clean

all: $(OUTPUTS)

%.txt: %.py
	$(PYTHON) $< | tee $@

clean:
	rm -f $(OUTPUTS)
