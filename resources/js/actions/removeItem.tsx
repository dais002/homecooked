import { REMOVE_ITEM } from "./types";
import { Dispatch } from "redux";
import { Product } from "../interfaces/interfaces";

export const removeItem = (product: Product) => {
  return (dispatch: Dispatch) => {
    dispatch({
      type: REMOVE_ITEM,
      payload: product,
    });
  };
};
