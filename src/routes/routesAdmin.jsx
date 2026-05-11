import { devNavUrl, urlAdmin } from "../functions/functions-general";
import Dashboard from "../pages/developer/dashboard/Dashboard";
import Employees from "../pages/developer/employees/Employees";
import ProtectedRoute from "../pages/access/ProtectedRoute";

export const routesAdmin = [
  {
    path: `${devNavUrl}/${urlAdmin}`,
    element: (
      <ProtectedRoute>
        <Dashboard />
      </ProtectedRoute>
    ),
  },
  {
    path: `${devNavUrl}/${urlAdmin}/dashboard`,
    element: (
      <ProtectedRoute>
        <Dashboard />
      </ProtectedRoute>
    ),
  },
  {
    path: `${devNavUrl}/${urlAdmin}/employees`,
    element: (
      <ProtectedRoute>
        <Employees />
      </ProtectedRoute>
    ),
  },
];
