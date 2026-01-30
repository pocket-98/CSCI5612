from code_get import get_kaggle_data
import pandas as pd
import matplotlib.pyplot as plt

def make_bar_age(age_col, output_png):
    ages = list(set(age_col))
    counts = list(len(age_col[age_col == age]) for age in ages)
    plt.figure(figsize=(8,6))
    plt.bar(ages, counts)
    plt.title("Number of Applicants Comparison By Age")
    plt.xlabel("Age (years)")
    plt.ylabel("Count")
    plt.savefig(output_png)

def make_bar_gender(gender_col, output_png):
    genders = list(set(gender_col))
    counts = list(len(gender_col[gender_col == g]) for g in genders)
    plt.figure(figsize=(8,6))
    plt.bar(genders, counts)
    plt.title("Number of Applicants Comparison By Gender")
    plt.xlabel("Gender")
    plt.ylabel("Count")
    plt.savefig(output_png)

def make_bar_dev(dev_col, output_png):
    devtypes = list(set(dev_col))
    counts = list(len(dev_col[dev_col == d]) for d in devtypes)
    plt.figure(figsize=(8,6))
    plt.bar(devtypes, counts)
    plt.title("Number of Applicants Comparison By Developer Status")
    plt.xlabel("Developer Status")
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

def make_histogram_salary(salary_col, output_png):
    plt.figure(figsize=(8,6))
    plt.hist(x=salary_col, bins=25)
    plt.title("Applicant Distribution of Previous Job's Salary")
    plt.xlabel("Previous Salary ($)")
    plt.ylabel("Count")
    plt.savefig(output_png)

def make_histogram_skills(skills_col, output_png):
    plt.figure(figsize=(8,6))
    plt.hist(x=skills_col, bins=50)
    plt.title("Applicant Distribution of Number of Computer Skills Listed")
    plt.xlabel("Applicant Number of Listed Computer Skills")
    plt.ylabel("Count")
    plt.savefig(output_png)

def make_scatter_skill_salary(skills_col, salary_col, output_png):
    plt.figure(figsize=(8,6))
    plt.scatter(skills_col, salary_col, s=4)
    plt.title("Applicant Number of Skills vs Previous Job's Salary")
    plt.xlabel("Applicant Number of Listed Computer Skills")
    plt.ylabel("Salary ($)")
    plt.savefig(output_png)

def make_scatter_experience_salary(experience_col, salary_col, output_png):
    plt.figure(figsize=(8,6))
    plt.scatter(experience_col, salary_col, s=4)
    plt.title("Applicant Professional Years of Coding Experience vs Previous Job's Salary")
    plt.xlabel("Applicant Professional Years of Coding Experience")
    plt.ylabel("Salary ($)")
    plt.savefig(output_png)

def make_plot_experience_median_salary(experience_col, salary_col, output_png):
    min_year = min(experience_col)
    max_year = max(experience_col)
    years_exp = list()
    median_salaries = list()
    for y in range(min_year, max_year+1):
        year_salaries = salary_col[experience_col == y]
        years_exp.append(y)
        median_salaries.append(year_salaries.median())
    plt.figure(figsize=(8,6))
    plt.plot(years_exp, median_salaries)
    plt.title("Applicant Professional Years of Coding Experience vs Median Previous Job's Salary")
    plt.xlabel("Applicant Professional Years of Coding Experience")
    plt.ylabel("Median Salary ($)")
    plt.savefig(output_png)


if __name__ == "__main__":
    df = get_kaggle_data()

    print("making bar chart of age")
    make_bar_age(df["Age"], "raw_bar_age.png")

    print("making bar chart of gender")
    make_bar_gender(df["Gender"], "raw_bar_gender.png")

    print("making bar chart of developer types")
    make_bar_dev(df["MainBranch"], "raw_bar_dev.png")

    print("making histogram of years coding")
    make_histogram_years_code(df["YearsCode"], "raw_hist_years_coding.png")

    print("making histogram of professional years coding")
    make_histogram_years_code_pro(df["YearsCodePro"], "raw_hist_years_coding_pro.png")

    print("making histogram of previous salary")
    make_histogram_salary(df["PreviousSalary"], "raw_hist_salary.png")

    print("making histogram of computer skills")
    make_histogram_skills(df["ComputerSkills"], "raw_hist_skills.png")

    print("making scatter of skills vs previous salary")
    make_scatter_skill_salary(df["ComputerSkills"], df["PreviousSalary"], "raw_scatter_skill_salary.png")

    print("making scatter of pro years exp vs previous salary")
    make_scatter_experience_salary(df["YearsCodePro"], df["PreviousSalary"], "raw_scatter_experience_salary.png")

    print("making plot of pro years exp vs median previous salary")
    make_plot_experience_median_salary(df["YearsCodePro"], df["PreviousSalary"], "raw_plot_experience_median_salary.png")

