import { useEffect, useState } from "react";
import { devNavUrl, urlDeveloper } from "../functions-general";

const userLogin = (navigate) => {
  const [loginLoading, setLoginLoading] = useState(true);

  useEffect(() => {
    const hristoken = JSON.parse(localStorage.getItem("hristoken"));
    if (hristoken && hristoken.role) {
      navigate(`${devNavUrl}/${hristoken.role}`);
    } else {
      if (hristoken) localStorage.removeItem("hristoken");
      setLoginLoading(false);
    }
  }, []);

  return { loginLoading };
};

export default userLogin;
