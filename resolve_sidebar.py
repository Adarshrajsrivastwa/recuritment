# -*- coding: utf-8 -*-
import io

SRC = r'C:\Users\Adarsh Raj\OneDrive\Desktop\recuritment\_merge_tmp\sidebar_theirs.jsx'
OUT = r'C:\Users\Adarsh Raj\OneDrive\Desktop\padhlo\frontend\src\components\dashboard\Sidebar.jsx'

s = io.open(SRC, 'r', encoding='utf-8', newline='').read()
crlf = '\r\n' in s
s = s.replace('\r\n', '\n')

# 1) imports: add Bell, Megaphone, FolderKanban
old = "  Settings, ChevronLeft, ChevronRight, LogOut, Building, Briefcase, Award, ArrowLeft\n} from 'lucide-react';"
new = "  Settings, ChevronLeft, ChevronRight, LogOut, Building, Briefcase, Award, ArrowLeft,\n  Bell, Megaphone, FolderKanban\n} from 'lucide-react';"
assert old in s, 'import anchor not found'
s = s.replace(old, new)

# 2) role navs: union of branch ids + class-content ids
i = s.index("  // Role-specific navigation items")
j = s.index("  const currentNav =")
navs = """  // Role-specific navigation items
  const studentNav = [
    { id: 'overview', label: 'Overview', icon: LayoutDashboard },
    { id: 'courses', label: 'My Courses', icon: GraduationCap },
    { id: 'assignments', label: 'Assignments', icon: ClipboardList },
    { id: 'classroom', label: 'Classroom', icon: MessageSquare, badge: 'Live' },
    { id: 'messages', label: 'Messages', icon: FolderKanban, unread: 2 },
    { id: 'resources', label: 'Resources', icon: BookOpen },
    { id: 'notifications', label: 'Notifications', icon: Bell },
    { id: 'practice', label: 'Practice Sandbox', icon: Sparkles },
    { id: 'companion', label: 'AI Companion', icon: BrainCircuit, highlight: true },
    { id: 'progress', label: 'Progress', icon: TrendingUp },
    { id: 'calendar', label: 'Schedule', icon: Calendar },
    { id: 'settings', label: 'Settings', icon: Settings },
  ];

  const tutorNav = [
    { id: 'overview', label: 'Overview', icon: LayoutDashboard },
    { id: 'batches', label: 'Live Batches', icon: BookOpen, badge: 'Live' },
    { id: 'students', label: 'Students List', icon: Users },
    { id: 'assignments', label: 'Assignments', icon: ClipboardList },
    { id: 'classroom', label: 'Classroom', icon: MessageSquare, badge: 'Live' },
    { id: 'content-management', label: 'Content Management', icon: FileText },
    { id: 'updates', label: 'Teacher Updates', icon: Megaphone },
    { id: 'analytics', label: 'Earnings & Impact', icon: TrendingUp },
    { id: 'settings', label: 'Settings', icon: Settings },
  ];

  const orgNav = [
    { id: 'overview', label: 'Overview', icon: LayoutDashboard },
    { id: 'tutors', label: 'Educators Directory', icon: Briefcase },
    { id: 'students', label: 'Enrolled Students', icon: Users },
    { id: 'programs', label: 'Academic Programs', icon: Building },
    { id: 'accreditation', label: 'Verification & Code', icon: Award },
    { id: 'settings', label: 'Settings', icon: Settings },
  ];

"""
s = s[:i] + navs + s[j:]

# 3) EMPTY SIDEBAR placeholder -> real nav rendering
i = s.index("      {/* Empty Sidebar Area */}")
j = s.index("      {/* Footer Profile & Logout */}")
nav_block = """      {/* Navigation */}
      <div className="flex-1 overflow-y-auto px-3 py-4">
        <div className="space-y-1">
          {!isCollapsed && (
            <p className="px-3 pb-2 text-[10px] font-bold text-[#F5F1E8]/40 uppercase tracking-wider">
              Navigation
            </p>
          )}

          {currentNav.map((item) => {
            const Icon = item.icon;
            const isActive = activeTab === item.id;

            return (
              <button
                key={item.id}
                onClick={() => handleNavClick(item.id)}
                className={`w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-semibold transition-all duration-200 cursor-pointer ${
                  isActive
                    ? 'bg-[#C96547] text-[#F5F1E8] shadow-md shadow-[#C96547]/25'
                    : item.highlight
                    ? 'text-[#D9795D] bg-[#C96547]/10 border border-[#C96547]/25 hover:bg-[#C96547]/20'
                    : 'text-[#F5F1E8]/60 hover:text-[#F5F1E8] hover:bg-[#34251D]'
                } ${isCollapsed ? 'justify-center px-0' : ''}`}
                title={isCollapsed ? item.label : undefined}
              >
                <Icon
                  className={`w-4 h-4 shrink-0 ${
                    isActive
                      ? 'text-[#F5F1E8]'
                      : item.highlight
                      ? 'text-[#D9795D]'
                      : 'text-[#F5F1E8]/60'
                  }`}
                />

                {!isCollapsed && (
                  <span className="flex-1 text-left truncate">
                    {item.label}
                  </span>
                )}

                {!isCollapsed && item.badge && (
                  <span className="px-1.5 py-0.5 rounded text-[9px] font-bold bg-[#C96547]/25 text-[#D9795D] border border-[#C96547]/30">
                    {item.badge}
                  </span>
                )}

                {!isCollapsed && item.unread && (
                  <span className="w-4 h-4 rounded-full bg-[#C96547] text-[#F5F1E8] text-[9px] font-bold flex items-center justify-center">
                    {item.unread}
                  </span>
                )}
              </button>
            );
          })}
        </div>
      </div>

"""
s = s[:i] + nav_block + s[j:]

io.open(OUT, 'w', encoding='utf-8', newline=('\r\n' if crlf else '\n')).write(s)
print('sidebar written, lines:', s.count(chr(10)))
