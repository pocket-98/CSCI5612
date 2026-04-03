import numpy as np
import pandas as pd
import matplotlib.pyplot as plt
import seaborn as sns

from mlxtend.frequent_patterns import apriori
from mlxtend.frequent_patterns import association_rules

pd.set_option("display.max_colwidth", None)
pd.set_option("display.max_columns", None)
pd.set_option("display.width", 128)

def plot_lift_heatmap(rules, output_png="output.png"):
    rules["lhs_count"] = rules["antecedents"].apply(lambda x:len(x))
    rules[rules["lhs_count"]>1].sort_values("lift", ascending=False).head()
    rules["lhs"] = rules["antecedents"].apply(lambda a: (",").join(list(a)))
    rules["rhs"] = rules["consequents"].apply(lambda a: (",").join(list(a)))
    pivot = rules[rules["lhs_count"]>1].pivot(index="lhs", columns="rhs", values="lift")

    plt.figure(figsize=(12,8))
    sns.heatmap(pivot, annot=True)
    plt.title("lift heatmap")
    plt.yticks(rotation=0)
    plt.xticks(rotation=90)
    plt.savefig(output_png)

if __name__ == "__main__":
    df = pd.read_csv("stackoverflow_skills.csv", index_col=0)

    frequent_itemsets = apriori(df, min_support=0.2, use_colnames=True)
    print(frequent_itemsets)

    rules = association_rules(frequent_itemsets, metric="lift", min_threshold=1)
    good_rules = rules[rules["confidence"]>0.2]
    #print(good_rules)

    print("--------------------")
    print("top 15 support")
    print("--------------------")
    print(good_rules.sort_values("support", ascending=False).head(15))
    print()

    print("--------------------")
    print("top 15 confidence")
    print("--------------------")
    print(good_rules.sort_values("confidence", ascending=False).head(15))
    print()

    print("--------------------")
    print("top 15 lift")
    print("--------------------")
    print(good_rules.sort_values("lift", ascending=False).head(15))
    print()

    plot_lift_heatmap(good_rules, "lift_heatmap.png")
