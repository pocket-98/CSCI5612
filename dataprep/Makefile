# Makefile for generating python outputs from scripts

PYTHON := /usr/bin/python3
SCRIPTS := code_get.py code_raw_vis.py code_clean.py code_new_vis.py
OUTPUTS = $(patsubst %.py,%.txt, $(filter %.py,$(SCRIPTS)))

.PHONY: all clean

all: $(OUTPUTS)

%.txt: %.py
	$(PYTHON) $< | tee $@

clean:
	rm -f $(OUTPUTS)
