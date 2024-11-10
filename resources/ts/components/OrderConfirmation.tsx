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
import {
    Table,
    TableBody,
    TableCaption,
    TableCell,
    TableFooter,
    TableHead,
    TableHeader,
    TableRow,
} from "@/components/ui/table";

import {
    Select,
    SelectContent,
    SelectGroup,
    SelectItem,
    SelectLabel,
    SelectTrigger,
    SelectValue,
} from "@/components/ui/select";

import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { useEffect, useState } from "react";
import { toast } from "sonner";

type Props = {
    cart: any;
    setCart: any;
    products: any;
    csrfToken: any;
    quantity: any;
    handleQuantityChange: any;
};

export function OrderConfirmation({
    cart,
    setCart,
    products,
    csrfToken,
    quantity,
    handleQuantityChange,
}: Props) {
    const [totalPrice, setTotalPrice] = useState(0);
    const [address, setAddress] = useState(
        sessionStorage.getItem("address") || ""
    );
    const [city, setCity] = useState(sessionStorage.getItem("city") || "");
    const [state, setState] = useState(sessionStorage.getItem("state") || "");
    const [pin, setPin] = useState(sessionStorage.getItem("pin") || "");
    const [validatationErrors, setValidatvalidatationErrors] = useState([]);
    const [dialogOpen, setDialogOpen] = useState(
        sessionStorage.getItem("dialogOpen") || false
    );

    // useEffect(() => {
    //     setTotalPrice(
    //         products.reduce((total: number, product) => {
    //             if (cart.includes(product.id)) {
    //                 total +=
    //                     (product.price -
    //                         (product.price * product.discount) / 100) *
    //                     parseInt(quantity[product.id]);
    //             }
    //             return total;
    //         }, 0)
    //     );
    //     setQuantity(
    //         cart.reduce(
    //             (acc: any, productId: any) => ({ ...acc, [productId]: 1 }),
    //             {}
    //         )
    //     );
    // }, [cart]);

    useEffect(() => {
        setTotalPrice(
            products.reduce((total, product) => {
                if (cart.includes(product.id)) {
                    total +=
                        (product.price -
                            (product.price * product.discount) / 100) *
                        quantity[product.id];
                }
                return Number(total.toFixed(2));
            }, 0)
        );
    }, [quantity, []]);

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
            body: JSON.stringify({ cart, address, city, state, pin, quantity }),
        });
        if (response.redirected) {
            // Set values in session
            sessionStorage.setItem("address", address);
            sessionStorage.setItem("city", city);
            sessionStorage.setItem("state", state);
            sessionStorage.setItem("pin", pin);
            sessionStorage.setItem("cart", JSON.stringify(cart));
            sessionStorage.setItem("dialogOpen", JSON.stringify(true));
            window.location.href = response.url;
        } else {
            const data = await response.json();
            setDialogOpen(false);
            toast(data.message);
            setCart([]);
            sessionStorage.clear();
        }
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
            <DialogContent className="sm:max-w-5xl">
                <DialogHeader>
                    <DialogTitle>Order Details</DialogTitle>
                    <DialogDescription>
                        Please confirm your order and share your address with
                        us.
                    </DialogDescription>
                </DialogHeader>
                <div className="flex flex-col gap-5 sm:flex-row">
                    <div className="w-full sm:w-1/2">
                        <h1 className="mb-2 font-semibold">Your Cart</h1>
                        <Table>
                            <TableHeader>
                                <TableRow>
                                    <TableHead className="">Name</TableHead>
                                    <TableHead>Price</TableHead>
                                    <TableHead>Quantity</TableHead>
                                    <TableHead className="text-right">
                                        Total
                                    </TableHead>
                                </TableRow>
                            </TableHeader>
                            <TableBody>
                                {products.map(
                                    (product: any) =>
                                        cart.includes(product.id) && (
                                            <TableRow key={product.id}>
                                                <TableCell className="font-medium">
                                                    {product.name}
                                                </TableCell>
                                                <TableCell>
                                                    {product.price -
                                                        (product.price *
                                                            product.discount) /
                                                            100}
                                                </TableCell>
                                                <TableCell>
                                                    <Select
                                                        value={
                                                            quantity[product.id]
                                                        }
                                                        onValueChange={(e) =>
                                                            handleQuantityChange(
                                                                product.id,
                                                                e
                                                            )
                                                        }
                                                    >
                                                        <SelectTrigger className="">
                                                            <SelectValue
                                                                placeholder={
                                                                    quantity[
                                                                        product
                                                                            .id
                                                                    ]
                                                                }
                                                            />
                                                        </SelectTrigger>
                                                        <SelectContent>
                                                            <SelectGroup>
                                                                <SelectLabel>
                                                                    Quantity
                                                                </SelectLabel>
                                                                {Array.from(
                                                                    {
                                                                        length: 100,
                                                                    },
                                                                    (_, i) =>
                                                                        i + 1
                                                                ).map((num) => (
                                                                    <SelectItem
                                                                        key={
                                                                            num
                                                                        }
                                                                        value={
                                                                            num
                                                                        }
                                                                    >
                                                                        {num}
                                                                    </SelectItem>
                                                                ))}
                                                            </SelectGroup>
                                                        </SelectContent>
                                                    </Select>
                                                </TableCell>
                                                <TableCell className="text-right">
                                                    &#8377;{" "}
                                                    {(
                                                        (product.price -
                                                            (product.price *
                                                                product.discount) /
                                                                100) *
                                                        quantity[product.id]
                                                    ).toFixed(2)}
                                                </TableCell>
                                            </TableRow>
                                        )
                                )}
                            </TableBody>
                            <TableFooter>
                                <TableRow className="font-semibold">
                                    <TableCell colSpan={3}>Total</TableCell>
                                    <TableCell className="text-right">
                                        &#8377; {totalPrice}
                                    </TableCell>
                                </TableRow>
                            </TableFooter>
                        </Table>
                    </div>
                    <div className="w-full sm:w-1/2">
                        <div>
                            <Label
                                htmlFor="address"
                                className="font-semibold text-md"
                            >
                                Shipping Address
                            </Label>
                            <Input
                                className="w-11/12 mx-auto mt-2"
                                id="address"
                                placeholder="Street Address*"
                                value={address}
                                onChange={(e) => setAddress(e.target.value)}
                                required
                            />
                            <Input
                                className="w-11/12 mx-auto mt-2"
                                id="city"
                                placeholder="City*"
                                value={city}
                                onChange={(e) => setCity(e.target.value)}
                                required
                            />
                            <Input
                                className="w-11/12 mx-auto mt-2"
                                id="state"
                                placeholder="State*"
                                value={state}
                                onChange={(e) => setState(e.target.value)}
                                required
                            />
                            <Input
                                className="w-11/12 mx-auto mt-2"
                                id="pin"
                                type="number"
                                placeholder="PIN*"
                                value={pin}
                                onChange={(e) => setPin(e.target.value)}
                                required
                            />
                        </div>
                        <div>
                            {validatationErrors.map((error) => (
                                <p
                                    className="text-center text-red-500"
                                    key={error}
                                >
                                    {error}
                                </p>
                            ))}
                        </div>
                    </div>
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
