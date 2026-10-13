import io

p = r"C:\Users\Adarsh Raj\OneDrive\Desktop\padhlo\frontend\src\components\SignupForm.jsx"

with io.open(p, "r", encoding="utf-8", newline="") as f:
    s = f.read()

nl = "\r\n" if "\r\n" in s else "\n"
lines = s.split(nl)

i_ours = next(i for i, l in enumerate(lines) if l.startswith("<<<<<<< HEAD"))
i_sep = next(i for i, l in enumerate(lines) if l.startswith("======="))
i_theirs = next(i for i, l in enumerate(lines) if l.startswith(">>>>>>>"))

head_block = lines[i_ours + 1:i_sep]        # lines 378..479
theirs_block = lines[i_sep + 1:i_theirs]    # lines 481..496

panels = head_block[0:87]                   # lines 378..464 (verification panels)
return_btn = head_block[95:101]             # lines 473..478 (Return to Home button)

def indent14(l):
    return " " * 14 + l.strip()

new = []
new += lines[:i_ours]                       # through line 376
new += panels                               # HEAD verification panels
new += [" " * 12 + theirs_block[0].strip()]  # opener div
new += [indent14(l) for l in theirs_block[1:7]]   # Start New Registration (branch)
rb = [indent14(l) for l in return_btn]
rb = [l.replace("w-1/2", "flex-1").replace('transition-colors"', 'transition-colors cursor-pointer"') for l in rb]
new += rb                                   # Return to Home (HEAD, flex-1)
new += [indent14(l) for l in theirs_block[7:16]]  # Go to Dashboard (branch)
# NOTE: no closing </div> here - the shared tail line closes the button row
new += lines[i_theirs + 1:]                 # from line 498 onward

out = nl.join(new)
with io.open(p, "w", encoding="utf-8", newline="") as f:
    f.write(out)

print("markers left:", out.count("<<<<<<<"), out.count("======="), out.count(">>>>>>>"))
print("---- assembled region ----")
for l in new[i_ours - 4:i_ours + 115]:
    print(repr(l))
