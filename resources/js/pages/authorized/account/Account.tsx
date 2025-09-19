import React from "react";
import {useOutletContext} from "react-router-dom";
import {User} from "../../../context/AuthContext";

const Account: React.FC = () => {
    const {user} = useOutletContext<{ user: User }>();
    return (
        <>
            {user.avatar}
        </>
    );
};

export default Account;
