import pandas as pd

if __name__ == "__main__":
    datafile = "../../dataprep/stackoverflow_clean.csv"
    df = pd.read_csv(datafile, index_col=0)
    quant_df = df.drop(columns=["Age", "EdLevel", "Gender", "MentalHealth", "MainBranch", "Country"])
    quant_df["YearsCodeBeforePro"] = quant_df["YearsCode"] - quant_df["YearsCodePro"]
    quant_df = quant_df[quant_df["YearsCodeBeforePro"] > 0]
    label = quant_df["Employed"]
    quant_df = quant_df.drop(columns=["YearsCode", "Employed"])
    print("X:")
    print(quant_df.describe())
    print()
    print("label: EmploymentStatus")
    print(label.describe())
    xy_df = quant_df.copy()
    xy_df["LabelEmploymentStatus"] = label
    xy_df.to_csv("stackoverflow_labeled.csv")
