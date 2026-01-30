# Makefile for generating python outputs from scripts

PYTHON := /usr/bin/python3
SCRIPTS := code_get.py
OUTPUTS = $(patsubst %.py,%.txt, $(filter %.py,$(SCRIPTS)))

.PHONY: all clean

all: $(OUTPUTS)

%.txt: %.py
	$(PYTHON) $< | tee $@

clean:
	rm -f $(OUTPUTS)
