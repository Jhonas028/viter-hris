import React from "react";
import { StoreContext } from "../../../store/StoreContext";
import Layout from "../Layout";
import useQueryData from "../../../functions/custom-hooks/useQueryData";
import { apiVersion } from "../../../functions/functions-general";
import { FaBullhorn, FaUserFriends, FaClipboardList } from "react-icons/fa";
import { MdCelebration, MdCake, MdWorkHistory } from "react-icons/md";

const getInitials = (firstName, lastName) =>
  `${firstName?.charAt(0) || ""}${lastName?.charAt(0) || ""}`.toUpperCase();

const Avatar = ({ firstName, lastName, size = "md" }) => {
  const sizes = {
    sm: "min-w-[2rem] min-h-[2rem] max-w-[2rem] max-h-[2rem] text-xs",
    md: "min-w-[2.5rem] min-h-[2.5rem] max-w-[2.5rem] max-h-[2.5rem] text-sm",
    lg: "min-w-[3rem] min-h-[3rem] max-w-[3rem] max-h-[3rem] text-base",
  };
  return (
    <div
      className={`flex bg-primary rounded-full justify-center items-center text-white font-semibold uppercase shrink-0 ${sizes[size] || sizes.md}`}
    >
      {getInitials(firstName, lastName)}
    </div>
  );
};

const SectionCard = ({ title, icon, children }) => (
  <div className="bg-white border border-gray-200 rounded-md p-4 flex flex-col gap-3">
    <h2 className="text-primary font-semibold flex items-center gap-2 text-sm border-b pb-2">
      {icon}
      {title}
    </h2>
    {children}
  </div>
);

const Dashboard = () => {
  const { store } = React.useContext(StoreContext);

  const today = new Date();
  const currentMonth = today.getMonth();
  const currentYear = today.getFullYear();
  const currentDay = today.getDate();

  const { data: dataEmployees, isLoading: isLoadingEmployees } = useQueryData(
    `${apiVersion}/controllers/developers/employees/employees.php`,
    "get",
    "dashboard-employees",
  );

  const { data: dataMemo, isLoading: isLoadingMemo } = useQueryData(
    `${apiVersion}/controllers/developers/memo/memo.php`,
    "get",
    "dashboard-memo",
  );

  const employees = dataEmployees?.data?.filter((e) => e.employee_is_active == 1) || [];
  const memos = dataMemo?.data || [];

  const birthdaysThisMonth = employees.filter((e) => {
    if (!e.employee_birthday) return false;
    const bDate = new Date(e.employee_birthday);
    return bDate.getMonth() === currentMonth;
  });

  const birthdayTodayIds = new Set(
    birthdaysThisMonth
      .filter((e) => new Date(e.employee_birthday).getDate() === currentDay)
      .map((e) => e.employee_aid),
  );

  const anniversariesThisMonth = employees.filter((e) => {
    if (!e.employee_start_work_date) return false;
    const sDate = new Date(e.employee_start_work_date);
    // exclude employees who started this year (not yet an anniversary)
    return sDate.getMonth() === currentMonth && sDate.getFullYear() < currentYear;
  });

  const newEmployeesThisMonth = employees.filter((e) => {
    if (!e.employee_start_work_date) return false;
    const sDate = new Date(e.employee_start_work_date);
    return sDate.getMonth() === currentMonth && sDate.getFullYear() === currentYear;
  });

  const employeesByDepartment = employees.reduce((acc, emp) => {
    const dept = emp.department_name || "Unassigned";
    if (!acc[dept]) acc[dept] = [];
    acc[dept].push(emp);
    return acc;
  }, {});

  const celebrationsExist =
    birthdaysThisMonth.length > 0 || anniversariesThisMonth.length > 0;

  const formatMonthDay = (dateStr) => {
    if (!dateStr) return "";
    const d = new Date(dateStr);
    return d.toLocaleDateString("en-US", { month: "long", day: "numeric" });
  };

  const welcomeName =
    store.credentials?.data?.user_first_name || "User";
  const welcomeLastName = store.credentials?.data?.user_last_name || "";

  return (
    <Layout menu="dashboard">
      <div className="mb-4">
        <h1 className="text-xl font-semibold">
          Welcome {welcomeLastName}, {welcomeName}!
        </h1>
      </div>

      <div className="grid grid-cols-1 lg:grid-cols-3 gap-4 items-start">
        {/* ── LEFT COLUMN ── */}
        <div className="flex flex-col gap-4">
          {/* WHO'S OUT — static until leave module is built */}
          <SectionCard title="Who's Out" icon={<FaClipboardList />}>
            <div>
              <p className="text-xs font-bold text-gray-500 mb-2 uppercase tracking-wide">
                Today
              </p>
              <p className="text-xs text-gray-400 italic">
                No leave records for today.
              </p>
            </div>
            <div>
              <p className="text-xs font-bold text-gray-500 mb-2 uppercase tracking-wide">
                Tomorrow
              </p>
              <p className="text-xs text-gray-400 italic">
                No leave records for tomorrow.
              </p>
            </div>
          </SectionCard>

          {/* CELEBRATIONS */}
          <SectionCard title="Celebrations" icon={<MdCelebration />}>
            {!celebrationsExist ? (
              <div className="text-center py-4 px-2">
                <div className="text-4xl mb-3">🎊</div>
                <p className="text-xs text-gray-500 leading-relaxed">
                  No celebration for today. However, we would like to express
                  our sincere appreciation and gratitude for all the hard work
                  of all our employees. You are the backbone of our company and
                  we value your contributions immensely. Thank you for your
                  understanding and cooperation.
                </p>
              </div>
            ) : (
              <div className="space-y-4">
                {birthdaysThisMonth.length > 0 && (
                  <div>
                    <p className="text-xs font-bold text-gray-500 mb-2 flex items-center gap-1">
                      <MdCake className="text-primary" /> Birthdays This Month
                    </p>
                    <div className="space-y-2">
                      {birthdaysThisMonth.map((emp) => (
                        <div
                          key={emp.employee_aid}
                          className="flex items-center gap-2"
                        >
                          <Avatar
                            firstName={emp.employee_first_name}
                            lastName={emp.employee_last_name}
                            size="sm"
                          />
                          <div>
                            <p className="text-xs font-medium leading-tight">
                              {emp.employee_last_name},{" "}
                              {emp.employee_first_name}
                              {birthdayTodayIds.has(emp.employee_aid) && (
                                <span className="ml-1 text-primary">
                                  🎂 Today!
                                </span>
                              )}
                            </p>
                            <p className="text-xs text-gray-400">
                              {formatMonthDay(emp.employee_birthday)}
                            </p>
                          </div>
                        </div>
                      ))}
                    </div>
                  </div>
                )}

                {anniversariesThisMonth.length > 0 && (
                  <div>
                    <p className="text-xs font-bold text-gray-500 mb-2 flex items-center gap-1">
                      <MdWorkHistory className="text-primary" /> Work
                      Anniversaries This Month
                    </p>
                    <div className="space-y-2">
                      {anniversariesThisMonth.map((emp) => {
                        const years =
                          currentYear -
                          new Date(emp.employee_start_work_date).getFullYear();
                        return (
                          <div
                            key={emp.employee_aid}
                            className="flex items-center gap-2"
                          >
                            <Avatar
                              firstName={emp.employee_first_name}
                              lastName={emp.employee_last_name}
                              size="sm"
                            />
                            <div>
                              <p className="text-xs font-medium leading-tight">
                                {emp.employee_last_name},{" "}
                                {emp.employee_first_name}
                              </p>
                              <p className="text-xs text-gray-400">
                                {years} year{years !== 1 ? "s" : ""} •{" "}
                                {formatMonthDay(emp.employee_start_work_date)}
                              </p>
                            </div>
                          </div>
                        );
                      })}
                    </div>
                  </div>
                )}
              </div>
            )}
          </SectionCard>

          {/* WELCOME / NEW EMPLOYEES */}
          <SectionCard
            title="Welcome to Frontline Business Solutions Inc."
            icon={<FaUserFriends />}
          >
            {isLoadingEmployees ? (
              <p className="text-xs text-gray-400">Loading...</p>
            ) : newEmployeesThisMonth.length === 0 ? (
              <p className="text-xs text-gray-500 text-center py-2 italic">
                No new employee yet.
              </p>
            ) : (
              <div className="space-y-2">
                {newEmployeesThisMonth.map((emp) => (
                  <div key={emp.employee_aid} className="flex items-center gap-2">
                    <Avatar
                      firstName={emp.employee_first_name}
                      lastName={emp.employee_last_name}
                      size="sm"
                    />
                    <div>
                      <p className="text-xs font-medium leading-tight">
                        {emp.employee_last_name}, {emp.employee_first_name}
                      </p>
                      <p className="text-xs text-gray-400">
                        {emp.department_name || "Unassigned"}
                      </p>
                    </div>
                  </div>
                ))}
              </div>
            )}
          </SectionCard>
        </div>

        {/* ── RIGHT COLUMN ── */}
        <div className="lg:col-span-2 flex flex-col gap-4">
          {/* ANNOUNCEMENT */}
          <SectionCard title="Announcement" icon={<FaBullhorn />}>
            {isLoadingMemo ? (
              <p className="text-xs text-gray-400">Loading...</p>
            ) : memos.length === 0 ? (
              <p className="text-xs text-gray-400 italic">
                No announcements available.
              </p>
            ) : (
              <div className="max-h-105 overflow-y-auto space-y-5 pr-1">
                {memos.map((memo) => (
                  <div
                    key={memo.memo_aid}
                    className="border-b border-gray-100 pb-5 last:border-0 last:pb-0"
                  >
                    <div className="flex items-start gap-2">
                      <FaBullhorn className="text-primary mt-0.5 shrink-0 text-sm" />
                      <div className="w-full">
                        <h3 className="font-semibold text-sm leading-tight">
                          {memo.memo_category}
                        </h3>
                        <p className="text-xs text-primary mb-2">
                          Date: {memo.memo_date}
                        </p>
                        <p className="text-xs text-gray-600 whitespace-pre-line leading-relaxed">
                          {memo.memo_text}
                        </p>
                      </div>
                    </div>
                  </div>
                ))}
              </div>
            )}
          </SectionCard>

          {/* MY TEAM */}
          <SectionCard title="My Team" icon={<FaUserFriends />}>
            {isLoadingEmployees ? (
              <p className="text-xs text-gray-400">Loading...</p>
            ) : Object.keys(employeesByDepartment).length === 0 ? (
              <p className="text-xs text-gray-400 italic">No employees found.</p>
            ) : (
              <div className="space-y-5">
                {Object.entries(employeesByDepartment).map(([dept, emps]) => (
                  <div key={dept}>
                    <p className="text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">
                      {dept}
                    </p>
                    <div className="grid grid-cols-2 sm:grid-cols-3 gap-3">
                      {emps.map((emp) => (
                        <div
                          key={emp.employee_aid}
                          className="flex items-center gap-2"
                        >
                          <Avatar
                            firstName={emp.employee_first_name}
                            lastName={emp.employee_last_name}
                            size="md"
                          />
                          <div>
                            <p className="text-xs font-medium leading-tight">
                              {emp.employee_last_name},{" "}
                              {emp.employee_first_name}
                            </p>
                            <p className="text-xs text-gray-400">
                              {emp.department_name || "Unassigned"}
                            </p>
                          </div>
                        </div>
                      ))}
                    </div>
                  </div>
                ))}
              </div>
            )}
          </SectionCard>
        </div>
      </div>
    </Layout>
  );
};

export default Dashboard;
