import { useEffect, useState } from "react";
import { devNavUrl, urlDeveloper } from "../functions-general";

const userLogin = (navigate) => {
  const [loginLoading, setLoginLoading] = useState(true);

  useEffect(() => {
    const wfstoken = JSON.parse(localStorage.getItem("wfstoken"));
    if (wfstoken) {
      navigate(`${devNavUrl}/${urlDeveloper}`);
    } else {
      setLoginLoading(false);
    }
  }, []);

  return { loginLoading };
};

export default userLogin;
