import io

p = r"C:\Users\Adarsh Raj\OneDrive\Desktop\padhlo\frontend\src\index.css"

with io.open(p, "r", encoding="utf-8", newline="") as f:
    s = f.read()

nl = "\r\n" if "\r\n" in s else "\n"

start_marker = "/* =========================================================\n   SIDEBAR"
start_marker = start_marker.replace("\n", nl)
end_marker = "/* =========================================================\n   UNIVERSAL DASHBOARD CARDS"
end_marker = end_marker.replace("\n", nl)

i = s.find(start_marker)
j = s.find(end_marker)
print("start idx:", i, "end idx:", j)
assert i != -1 and j != -1 and i < j

removed = s[i:j]
s2 = s[:i] + s[j:]

with io.open(p, "w", encoding="utf-8", newline="") as f:
    f.write(s2)

print("removed lines:", removed.count(nl))
print("new total lines:", s2.count(nl))
print("--- removed first 3 lines ---")
for l in removed.split(nl)[:3]:
    print(l)
