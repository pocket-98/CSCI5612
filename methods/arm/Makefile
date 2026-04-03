# Makefile for generating python outputs from scripts

PYTHON := $(shell which python3)
SCRIPTS := code_transactions.py code_arm.py
OUTPUTS = $(patsubst %.py,%.txt, $(filter %.py,$(SCRIPTS)))

.PHONY: all clean

all: $(OUTPUTS)

%.txt: %.py
	$(PYTHON) $< | tee $@

clean:
	rm -f $(OUTPUTS)
