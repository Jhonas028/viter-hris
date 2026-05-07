import React from "react";
import Layout from "../../Layout";
import DirectReportList from "./DirectReportList";
import { setIsAdd } from "../../../../store/StoreAction";
import { StoreContext } from "../../../../store/StoreContext";
import { FaPlus } from "react-icons/fa";
import ModalAddDirectReport from "./ModalAddDirectReport";
import useQueryData from "../../../../functions/custom-hooks/useQueryData";
import { apiVersion } from "../../../../functions/functions-general";
import ButtonSpinner from "../../../../partials/spinners/ButtonSpinner";

const DirectReport = () => {
  const { store, dispatch } = React.useContext(StoreContext);
  const [itemEdit, setItemEdit] = React.useState(null);

  const { isLoading, data: dataEmployees } = useQueryData(
    `${apiVersion}/controllers/developers/employees/employees.php`,
    "get",
    "employees-all",
  );

  const filterArrayActiveEmployees = dataEmployees?.data?.filter(
    (item) => item.employee_is_active == 1,
  );

  const handleAdd = () => {
    dispatch(setIsAdd(true));
    setItemEdit(null);
  };

  return (
    <>
      <Layout menu="settings" submenu="direct-report">
        <div className="flex items-center w-full justify-between">
          <h1>Direct Report</h1>
          <div>
            {isLoading ? (
              <ButtonSpinner />
            ) : (
              <button
                type="button"
                className="flex items=center gap-1 hover:underline"
                onClick={handleAdd}
              >
                <FaPlus className="text-primary" />
                Add
              </button>
            )}
          </div>
        </div>
        <div>
          <DirectReportList itemEdit={itemEdit} setItemEdit={setItemEdit} />
        </div>
      </Layout>
      {store.isAdd && (
        <ModalAddDirectReport
          itemEdit={itemEdit}
          filterArrayActiveEmployees={filterArrayActiveEmployees}
        />
      )}
    </>
  );
};

export default DirectReport;
