# -*- coding: utf-8 -*-
import io

SRC = r'C:\Users\Adarsh Raj\OneDrive\Desktop\recuritment\_merge_tmp\layout_theirs.jsx'
OUT = r'C:\Users\Adarsh Raj\OneDrive\Desktop\padhlo\frontend\src\components\dashboard\DashboardLayout.jsx'

s = io.open(SRC, 'r', encoding='utf-8', newline='').read()
crlf = '\r\n' in s
s = s.replace('\r\n', '\n')

# 1) imports: add view components
old = "import React, { useState } from 'react';\nimport Sidebar from './Sidebar';\nimport Header from './Header';"
new = ("import React, { useState } from 'react';\n"
       "import Sidebar from './Sidebar';\n"
       "import Header from './Header';\n"
       "import StudentDashboard from './StudentDashboard';\n"
       "import TeacherDashboard from './TeacherDashboard';\n"
       "import ClassroomView from './ClassroomView';\n"
       "import MyCoursesView from './MyCoursesView';\n"
       "import AssignmentsView from './AssignmentsView';\n"
       "import ContentManagement from './ContentManagement';\n"
       "import CourseResources from './CourseResources';\n"
       "import TeacherUpdates from './TeacherUpdates';\n"
       "import StudentNotifications from './StudentNotifications';\n"
       "import LearningCompanion from '../LearningCompanion';")
assert old in s, 'import anchor not found'
s = s.replace(old, new)

# 2) signature: accept onSelectCourse
old = "export default function DashboardLayout({ userRole = 'student', onLogout, onNavigate }) {"
new = "export default function DashboardLayout({ userRole = 'student', onLogout, onNavigate, onSelectCourse }) {"
assert old in s, 'signature anchor not found'
s = s.replace(old, new)

# 3) isTutorRole (branch tutor == class-content teacher)
old = "  const normalizedRole = (userRole === 'organization' || userRole === 'organisation') ? 'organisation' : userRole;\n"
new = old + "\n  const isTutorRole = normalizedRole === 'tutor' || normalizedRole === 'teacher';\n"
assert old in s, 'normalizedRole anchor not found'
s = s.replace(old, new, 1)

# 4) drop blank-canvas role maps
i = s.index("  const roleTitleMap =")
j = s.index("  return (")
s = s[:i] + s[j:]

# 5) root keeps padhlo-dashboard for cream retheme of inner views
old = 'className="min-h-screen bg-[#F5F1E8] text-[#171717] font-sans flex relative overflow-x-hidden bg-tech-grid"'
new = 'className="padhlo-dashboard min-h-screen bg-[#F5F1E8] text-[#171717] font-sans flex relative overflow-x-hidden bg-tech-grid"'
assert old in s, 'root class anchor not found'
s = s.replace(old, new)

# 6) main: replace blank canvas with tab -> view rendering
i = s.index('        <main ')
j = s.index('        </main>', i) + len('        </main>')

blocks = []
blocks.append(
"""          {['dashboard', 'overview'].includes(activeTab) && (
            <div className="p-4 sm:p-6 lg:p-8 max-w-7xl mx-auto">
              {isTutorRole ? (
                <TeacherDashboard onSelectTab={setActiveTab} onNavigate={onNavigate} />
              ) : (
                <StudentDashboard onSelectTab={setActiveTab} onSelectCourse={onSelectCourse} />
              )}
            </div>
          )}""")

simple = [
    ('courses', 'MyCoursesView', 'onSelectCourse={onSelectCourse}'),
    ('assignments', 'AssignmentsView', ''),
    ('resources', 'CourseResources', ''),
    ('notifications', 'StudentNotifications', ''),
]
for tab, comp, extra in simple:
    e = (' ' + extra) if extra else ''
    blocks.append(
        '          {activeTab === "%s" && (\n'
        '            <div className="p-4 sm:p-6 lg:p-8 max-w-7xl mx-auto">\n'
        '              <%s%s />\n'
        '            </div>\n'
        '          )}' % (tab, comp, e))

blocks.append(
"""          {activeTab === "classroom" && (
            <div className="p-4 sm:p-6 lg:p-8 max-w-7xl mx-auto">
              <ClassroomView userRole={isTutorRole ? "teacher" : "student"} />
            </div>
          )}""")

for tab, comp in [('content-management', 'ContentManagement'), ('updates', 'TeacherUpdates')]:
    blocks.append(
        '          {activeTab === "%s" && isTutorRole && (\n'
        '            <div className="p-4 sm:p-6 lg:p-8 max-w-7xl mx-auto">\n'
        '              <%s />\n'
        '            </div>\n'
        '          )}' % (tab, comp))

blocks.append(
"""          {activeTab === "companion" && (
            <div className="p-4 sm:p-6 lg:p-8 max-w-7xl mx-auto">
              <LearningCompanion onOpenAuth={() => {}} />
            </div>
          )}""")

placeholder_tabs = ["messages", "calendar", "progress", "practice", "notes", "bookmarks", "settings",
                    "batches", "students", "analytics", "tutors", "programs", "accreditation"]
arr = ',\n'.join('            "%s"' % t for t in placeholder_tabs)
blocks.append(
    '          {[\n' + arr + ',\n          ].includes(activeTab) && (\n'
    '            <div className="p-4 sm:p-6 lg:p-8 max-w-7xl mx-auto">\n'
    '              <div className="padhlo-card p-10 text-center">\n'
    '                <div className="w-14 h-14 mx-auto mb-4 rounded-2xl bg-[#f4e1d8] flex items-center justify-center">\n'
    '                  <span className="text-2xl">\U0001F4DA</span>\n'
    '                </div>\n'
    '                <h2 className="text-2xl font-bold text-[#34251D]">\n'
    '                  {activeTab.charAt(0).toUpperCase() + activeTab.slice(1)}\n'
    '                </h2>\n'
    '                <p className="mt-2 text-[#756B61]">\n'
    '                  This section is ready for the next phase.\n'
    '                </p>\n'
    '              </div>\n'
    '            </div>\n'
    '          )}')

new_main = '        <main className="flex-1 w-full">\n' + '\n\n'.join(blocks) + '\n        </main>'
s = s[:i] + new_main + s[j:]

io.open(OUT, 'w', encoding='utf-8', newline=('\r\n' if crlf else '\n')).write(s)
print('layout written, lines:', s.count(chr(10)))
