import React from "react";
import Layout from "../../Layout";
import NotificationList from "./NotificationList";
import { setIsAdd } from "../../../../store/StoreAction";
import { StoreContext } from "../../../../store/StoreContext";
import { FaPlus } from "react-icons/fa";
import ModalAddNotification from "./NotificationAddUsers";

const NotificationUsers = () => {
  const { store, dispatch } = React.useContext(StoreContext);
  const [itemEdit, setItemEdit] = React.useState(null);

  const handleAdd = () => {
    dispatch(setIsAdd(true));
    setItemEdit(null);
  };

  return (
    <>
      <Layout menu="settings" submenu="notification">
        {/* page header */}
        <div className="flex items-center w-full justify-between">
          <h1>Notification</h1>
          <div>
            <button
              type="button"
              className="flex items=center gap-1 hover:underline"
              onClick={handleAdd}
            >
              <FaPlus className="text-primary" />
              Add
            </button>
          </div>
        </div>
        {/* page content */}
        <div>
          <NotificationList itemEdit={itemEdit} setItemEdit={setItemEdit} />
        </div>
      </Layout>
      {store.isAdd && <ModalAddNotification itemEdit={itemEdit} />}
    </>
  );
};

export default NotificationUsers;
