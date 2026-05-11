import { devNavUrl } from "../functions/functions-general";
import CreatePassword from "../pages/access/CreatePassword";
import Login from "../pages/access/Login";

export const routesAccess = [
  {
    path: `${devNavUrl}/`,
    element: <Login />,
  },
  {
    path: `${devNavUrl}/login`,
    element: <Login />,
  },
  {
    path: `${devNavUrl}/create-password`,
    element: <CreatePassword />,
  },
];
