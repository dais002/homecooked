// import { initialState } from "./initialState";
import {
    SELECT_STORE,
    ADD_TO_CART,
    RESET_INSTORE,
    INCREMENT_ITEM,
    DECREMENT_ITEM,
    REMOVE_ITEM
} from "../actions/types";

const initialState = [];

const cartReducer = (state = initialState, action) => {
    const { type, payload } = action;

    if (type === SELECT_STORE) {
        return {
            ...state,
            inStore: payload
        };
    }

    if (type === ADD_TO_CART) {
        const { item, quantity } = payload;
        const { inStore, cart, totalCart, stores } = state;
        console.log("in add cart", item, quantity);

        let itemSelected = {
            ...stores[inStore].products[item]
        };

        itemSelected.cartCount += quantity;
        itemSelected.remaining -= quantity;

        return {
            ...state,
            cart: cart + quantity,
            totalCart: totalCart + itemSelected.price * quantity,
            stores: {
                ...stores,
                [inStore]: {
                    ...stores[inStore],
                    products: {
                        ...stores[inStore].products,
                        [item]: itemSelected
                    }
                }
            }
        };
    }

    if (type === RESET_INSTORE) {
        return {
            ...state,
            inStore: ""
        };
    }

    if (type === INCREMENT_ITEM) {
        const { store, item } = payload;
        const { cart, totalCart, stores } = state;

        let itemSelected = {
            ...stores[store].products[item]
        };

        itemSelected.cartCount += 1;
        itemSelected.remaining -= 1;

        return {
            ...state,
            cart: cart + 1,
            totalCart: totalCart + itemSelected.price,
            stores: {
                ...stores,
                [store]: {
                    ...stores[store],
                    products: {
                        ...stores[store].products,
                        [item]: itemSelected
                    }
                }
            }
        };
    }

    if (type === DECREMENT_ITEM) {
        const { store, item } = payload;
        const { cart, totalCart, stores } = state;

        let itemSelected = {
            ...stores[store].products[item]
        };

        itemSelected.cartCount -= 1;
        itemSelected.remaining += 1;

        return {
            ...state,
            cart: cart - 1,
            totalCart: totalCart - itemSelected.price,
            stores: {
                ...stores,
                [store]: {
                    ...stores[store],
                    products: {
                        ...stores[store].products,
                        [item]: itemSelected
                    }
                }
            }
        };
    }

    if (type === REMOVE_ITEM) {
        const { store, item } = payload;
        const { cart, totalCart, stores } = state;

        let itemSelected = {
            ...stores[store].products[item]
        };

        let quantity = itemSelected.cartCount;
        itemSelected.cartCount = 0;
        itemSelected.remaining += quantity;

        return {
            ...state,
            cart: cart - quantity,
            totalCart: totalCart - itemSelected.price * quantity,
            stores: {
                ...stores,
                [store]: {
                    ...stores[store],
                    products: {
                        ...stores[store].products,
                        [item]: itemSelected
                    }
                }
            }
        };
    }

    return state;
};

export default cartReducer;
