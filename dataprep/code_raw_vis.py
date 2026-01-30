from code_get import get_kaggle_data
import pandas as pd
import matplotlib.pyplot as plt

def make_histogram_age(age_col, output_png):
    plt.figure(figsize=(8,6))
    plt.hist(x=age_col, bins=3)
    plt.title("Number of Applicants Comparison By Age")
    plt.xlabel("Age (years)")
    plt.ylabel("Count")
    plt.savefig(output_png)

def make_histogram_years_code(years_code_col, output_png):
    plt.figure(figsize=(8,6))
    plt.hist(x=years_code_col, bins=25)
    plt.ylim((0,13000))
    plt.title("Applicant Distribution of Years Experience Coding")
    plt.xlabel("Years of Experience Coding")
    plt.ylabel("Count")
    plt.savefig(output_png)

def make_histogram_years_code_pro(years_code_col, output_png):
    plt.figure(figsize=(8,6))
    plt.hist(x=years_code_col, bins=25)
    plt.ylim((0,13000))
    plt.title("Applicant Distribution of Professional Years Experience Coding")
    plt.xlabel("Professional Years of Experience Coding")
    plt.ylabel("Count")
    plt.savefig(output_png)

if __name__ == "__main__":
    df = get_kaggle_data()

    print("making histogram of age")
    make_histogram_age(df["Age"], "raw_hist_age.png")

    print("making histogram of years coding")
    make_histogram_years_code(df["YearsCode"], "raw_hist_years_coding.png")

    print("making histogram of professional years coding")
    make_histogram_years_code_pro(df["YearsCodePro"], "raw_hist_years_coding_pro.png")

