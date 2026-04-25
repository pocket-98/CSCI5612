import numpy as np
import pandas as pd
import matplotlib.pyplot as plt

from sklearn.model_selection import train_test_split
from sklearn import tree
from sklearn.tree import DecisionTreeClassifier
from sklearn.metrics import accuracy_score
from sklearn.metrics import confusion_matrix
from sklearn.metrics import ConfusionMatrixDisplay


df = pd.read_csv("stackoverflow_labeled.csv", index_col=0)
y = df["LabelEmploymentStatus"]
X = df.drop(columns=["LabelEmploymentStatus"])
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

dt = DecisionTreeClassifier(max_depth=15)
dt.fit(X_train, y_train)

plt.figure(figsize=(8,6))
tree.plot_tree(dt, filled=True, max_depth=3)
plt.savefig("dt.png", dpi=300)
plt.close()


yhat_test = dt.predict(X_test)
accuracy = accuracy_score(y_test, yhat_test)
print("dt accuracy: %.4f" % accuracy)
confmat = confusion_matrix(y_test, yhat_test)
print()
print("confusion matrix")
print(confmat)


classNames = ["Unemployed", "Employed"]
disp = ConfusionMatrixDisplay(confmat, display_labels=classNames)
disp.plot(cmap="Blues")
disp.figure_.set_figwidth(8)
disp.figure_.set_figheight(6)
disp.ax_.set_title("Confusion Matrix For Decision Tree Classifier")
plt.savefig("dt_conf.png", dpi=300)
plt.close()

