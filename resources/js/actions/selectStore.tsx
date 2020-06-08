import { SELECT_STORE } from "./types";
import { Dispatch } from "redux";

export const selectStore = (store: string) => {
  return (dispatch: Dispatch) => {
    dispatch({
      type: SELECT_STORE,
      payload: store,
    });
  };
};
