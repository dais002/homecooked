import { createStore, combineReducers, applyMiddleware } from "redux";
import { composeWithDevTools } from "redux-devtools-extension";
import cartReducer from "./reducers/cart-reducer";
import thunk from "redux-thunk";

const rootReducer = combineReducers({
    cart: cartReducer
});

export default () => {
    const store = createStore(
        rootReducer,
        composeWithDevTools(applyMiddleware(thunk))
    );
    return store;
};
