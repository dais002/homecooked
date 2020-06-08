import { ADD_TO_CART } from "./types";
import { Dispatch } from "redux";

export const addToCart = ({
  item,
  quantity,
}: {
  item: string;
  quantity: string;
}) => {
  return (dispatch: Dispatch) => {
    dispatch({
      type: ADD_TO_CART,
      payload: {
        item,
        quantity,
      },
    });
  };
};
