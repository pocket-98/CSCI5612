from code_get import get_kaggle_data

def clean_data(df):
    print("number of records: %d" % len(df))
    print("removing unused columns: 'Accessibility', 'HaveWorkedWith', 'Employment'")
    df2 = df.drop(columns=["Unnamed: 0"])
    df2 = df2.drop(columns=["Accessibility", "HaveWorkedWith", "Employment"])

    print("removing rows of non-devs")
    df2 = df2[df2["MainBranch"] == "Dev"]

    print("removing outliers of >42 years pro experience")
    df2 = df2[df2["YearsCodePro"] <= 42]

    return df2

if __name__ == "__main__":
    df = get_kaggle_data()
    print("number of nulls in each col:")
    print(df.isnull().sum())
    print()

    clean_df = clean_data(df)
    print("cleaned data set number of records: %d" % len(clean_df))
    clean_df.to_csv("stackoverflow_clean.csv")
    #print(clean_df)


