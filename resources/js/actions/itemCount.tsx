import { INCREMENT_ITEM, DECREMENT_ITEM } from "./types";
import { Dispatch } from "redux";
import { Product } from '../interfaces/interfaces';

export const itemCount = (toggle: boolean, product: Product) => {
  return (dispatch: Dispatch) => {
    dispatch({
      type: toggle ? INCREMENT_ITEM : DECREMENT_ITEM,
      payload: product,
    });
  };
};
