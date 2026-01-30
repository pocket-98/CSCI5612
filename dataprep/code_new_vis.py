from code_get import get_kaggle_data
from code_clean import clean_data

from code_raw_vis import (
    make_bar_age,
    make_bar_gender,
    make_bar_dev,
    make_histogram_years_code,
    make_histogram_years_code_pro,
    make_histogram_salary,
    make_histogram_skills,
    make_scatter_skill_salary,
    make_scatter_experience_salary,
    make_plot_experience_median_salary,
)

if __name__ == "__main__":
    df = get_kaggle_data()
    clean_df = clean_data(df)

    print("making bar chart of age")
    make_bar_age(clean_df["Age"], "new_bar_age.png")

    print("making bar chart of gender")
    make_bar_gender(clean_df["Gender"], "new_bar_gender.png")

    print("making bar chart of developer types")
    make_bar_dev(clean_df["MainBranch"], "new_bar_dev.png")

    print("making histogram of years coding")
    make_histogram_years_code(clean_df["YearsCode"], "new_hist_years_coding.png")

    print("making histogram of professional years coding")
    make_histogram_years_code_pro(clean_df["YearsCodePro"], "new_hist_years_coding_pro.png")

    print("making histogram of previous salary")
    make_histogram_salary(clean_df["PreviousSalary"], "new_hist_salary.png")

    print("making histogram of computer skills")
    make_histogram_skills(clean_df["ComputerSkills"], "new_hist_skills.png")

    print("making scatter of skills vs previous salary")
    make_scatter_skill_salary(clean_df["ComputerSkills"], clean_df["PreviousSalary"], "new_scatter_skill_salary.png")

    print("making scatter of pro years exp vs previous salary")
    make_scatter_experience_salary(clean_df["YearsCodePro"], clean_df["PreviousSalary"], "new_scatter_experience_salary.png")

    print("making plot of pro years exp vs median previous salary")
    make_plot_experience_median_salary(clean_df["YearsCodePro"], clean_df["PreviousSalary"], "new_plot_experience_median_salary.png")

