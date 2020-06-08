import { connect } from "react-redux";
import Home from "../components/Home.jsx";
import { selectStore } from "../actions/selectStore";

const mapStateToProps = (state, ownProps) => {
  const { stores } = state.homeReducer;
  return {
    stores,
  };
};

export default connect(mapStateToProps, { selectStore })(Home);
