import { RESET_INSTORE } from "./types";
import { Dispatch } from "redux";

export const resetInStore = () => {
  return (dispatch: Dispatch) => {
    dispatch({
      type: RESET_INSTORE,
    });
  };
};
