import Cart from "../components/Cart";
import { itemCount } from "../actions/itemCount";
import { removeItem } from "../actions/removeItem";
import { connect } from "react-redux";

const mapStateToProps = (state) => {
  const { cart, totalCart, stores } = state.homeReducer;
  return {
    cart,
    totalCart,
    stores,
  };
};

const mapDispatchToProps = {
  itemCount,
  removeItem,
};

export default connect(mapStateToProps, mapDispatchToProps)(Cart);
