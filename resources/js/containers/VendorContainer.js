import { connect } from "react-redux";
import Vendor from "../components/Vendor";
import { addToCart } from "../actions/addToCart";

const mapStateToProps = (state, ownProps) => {
  const { inStore, cart, totalCart, stores } = state.homeReducer;
  return {
    inStore,
    cart,
    totalCart,
    store: stores[inStore],
  };
};

export default connect(mapStateToProps, { addToCart })(Vendor);
