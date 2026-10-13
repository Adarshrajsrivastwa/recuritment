import io

p = r"C:\Users\Adarsh Raj\OneDrive\Desktop\padhlo\frontend\src\components\SignupForm.jsx"

with io.open(p, "r", encoding="utf-8", newline="") as f:
    s = f.read()

nl = "\r\n" if "\r\n" in s else "\n"
lines = s.split(nl)

start = next(i for i, l in enumerate(lines) if "pt-2 flex flex-col sm:flex-row gap-3" in l)
end = next(i for i, l in enumerate(lines) if i > start and l.strip() == "</div>")

block = (
    " " * 14 + '<div className="pt-2 flex flex-col sm:flex-row gap-3">\n'
    + " " * 16 + '<button\n'
    + " " * 18 + 'onClick={() => setSubmittedData(null)}\n'
    + " " * 18 + 'className="flex-1 py-3 rounded-xl bg-[#281C16] hover:bg-[#281C16]/80 text-[#F5F1E8] font-semibold text-xs border border-[#F5F1E8]/15 transition-colors cursor-pointer"\n'
    + " " * 16 + '>\n'
    + " " * 18 + 'Start New Registration\n'
    + " " * 16 + '</button>\n'
    + " " * 16 + '<button\n'
    + " " * 18 + "onClick={() => onNavigate('/')}\n"
    + " " * 18 + 'className="flex-1 py-3 rounded-xl bg-[#C96547] hover:bg-[#D9795D] text-[#F5F1E8] font-semibold text-xs transition-colors cursor-pointer"\n'
    + " " * 16 + '>\n'
    + " " * 18 + 'Return to Home\n'
    + " " * 16 + '</button>\n'
    + " " * 16 + '<button\n'
    + " " * 18 + 'onClick={() => {\n'
    + " " * 20 + "const rolePath = submittedData.role === 'candidate' ? 'candidate' : (submittedData.role === 'organization' || submittedData.role === 'organisation') ? 'organisation' : 'tutor';\n"
    + " " * 20 + 'onNavigate(`/${rolePath}/dashboard`);\n'
    + " " * 18 + '}}\n'
    + " " * 18 + 'className="flex-1 py-3 rounded-xl bg-[#C96547] hover:bg-[#D9795D] text-[#F5F1E8] font-semibold text-xs transition-colors cursor-pointer"\n'
    + " " * 16 + '>\n'
    + " " * 18 + 'Go to Dashboard \u2192\n'
    + " " * 16 + '</button>\n'
    + " " * 14 + '</div>'
)

new_lines = lines[:start] + block.split("\n") + lines[end + 1:]
out = nl.join(new_lines)

with io.open(p, "w", encoding="utf-8", newline="") as f:
    f.write(out)

print("markers:", out.count("<<<<<<<"), out.count("======="), out.count(">>>>>>>"))
print("replaced lines", start + 1, "..", end + 1)
