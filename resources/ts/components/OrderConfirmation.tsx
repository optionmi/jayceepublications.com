import { Button } from "@/components/ui/button";
import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from "@/components/ui/dialog";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { useEffect, useState } from "react";
import { toast } from "sonner";

type Props = {
    cart: any;
    setCart: any;
    products: any;
    csrfToken: any;
};

export function OrderConfirmation({
    cart,
    setCart,
    products,
    csrfToken,
}: Props) {
    const [totalPrice, setTotalPrice] = useState(0);
    const [address, setAddress] = useState("");
    const [city, setCity] = useState("");
    const [state, setState] = useState("");
    const [pin, setPin] = useState("");
    const [validatationErrors, setValidatvalidatationErrors] = useState([]);
    const [dialogOpen, setDialogOpen] = useState(false);

    useEffect(() => {
        setTotalPrice(
            products.reduce((total, product) => {
                if (cart.includes(product.id)) {
                    total +=
                        product.price -
                        (product.price * product.discount) / 100;
                }
                return total;
            }, 0)
        );
    }, [cart]);

    async function handleOrderConfirmation() {
        if (!address || !city || !state || !pin) {
            setValidatvalidatationErrors(["All fields are required"]);
            return;
        }
        const response = await fetch(route("web.order.confirmation"), {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-Token": csrfToken,
            },
            body: JSON.stringify({ cart, address, city, state, pin }),
        });
        const data = await response.json();
        setDialogOpen(false);
        toast(data.message);
        setCart([]);
    }

    return (
        <Dialog
            open={dialogOpen}
            onOpenChange={() => setDialogOpen(!dialogOpen)}
        >
            <DialogTrigger asChild>
                <Button variant="default" disabled={cart.length < 1}>
                    Place Order
                </Button>
            </DialogTrigger>
            <DialogContent className="sm:w-[40rem]">
                <DialogHeader>
                    <DialogTitle>Order Details</DialogTitle>
                    <DialogDescription>
                        Please confirm your order and share your address with
                        us.
                    </DialogDescription>
                </DialogHeader>
                <div>
                    <h1 className="mb-2 font-semibold text-md">Your Cart</h1>
                    {products.map(
                        (product) =>
                            cart.includes(product.id) && (
                                <div
                                    className="grid w-11/12 grid-cols-5 mx-auto"
                                    key={product.id}
                                >
                                    <span className="col-span-4 text-gray-600">
                                        {product.name}
                                    </span>
                                    <span className="text-gray-700">
                                        &#8377;{" "}
                                        {product.price -
                                            (product.price * product.discount) /
                                                100}
                                    </span>
                                </div>
                            )
                    )}
                    <div className="grid w-11/12 grid-cols-5 py-1 mx-auto my-2 border-gray-600 border-y">
                        <span className="col-span-4 text-gray-800 ">Total</span>
                        <span className="text-gray-900 ">
                            &#8377; {totalPrice}
                        </span>
                    </div>
                </div>
                <div>
                    <Label htmlFor="address" className="font-semibold text-md">
                        Shipping Address
                    </Label>
                    <Input
                        className="w-11/12 mx-auto mt-2"
                        id="address"
                        placeholder="Street Address*"
                        onChange={(e) => setAddress(e.target.value)}
                        required
                    />
                    <Input
                        className="w-11/12 mx-auto mt-2"
                        id="city"
                        placeholder="City*"
                        onChange={(e) => setCity(e.target.value)}
                        required
                    />
                    <Input
                        className="w-11/12 mx-auto mt-2"
                        id="state"
                        placeholder="State*"
                        onChange={(e) => setState(e.target.value)}
                        required
                    />
                    <Input
                        className="w-11/12 mx-auto mt-2"
                        id="pin"
                        type="number"
                        placeholder="PIN*"
                        onChange={(e) => setPin(e.target.value)}
                        required
                    />
                </div>
                <div>
                    {validatationErrors.map((error) => (
                        <p className="text-center text-red-500" key={error}>
                            {error}
                        </p>
                    ))}
                </div>
                <DialogFooter>
                    <Button type="submit" onClick={handleOrderConfirmation}>
                        Confirm Order
                    </Button>
                </DialogFooter>
            </DialogContent>
        </Dialog>
    );
}
