import {
    CaretSortIcon,
    ChevronDownIcon,
    DotsHorizontalIcon,
} from "@radix-ui/react-icons";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuLabel,
    DropdownMenuRadioGroup,
    DropdownMenuRadioItem,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardFooter, CardHeader } from "./ui/card";
import { ProductsSkeleton } from "./ProductsSkeleton";
import { useState } from "react";

type ProductTableProps = {
    products: any;
    length: number;
    loading: boolean;
    cart: any;
    addToCart: any;
    removeFromCart: any;
};

export default function ProductTable({
    products,
    length,
    loading,
    cart,
    addToCart,
    removeFromCart,
}: ProductTableProps) {
    return (
        <>
            {/* <DropdownMenu>
        <DropdownMenuTrigger asChild>
        <Button variant="outline">Open</Button>
        </DropdownMenuTrigger>
        <DropdownMenuContent className="w-56">
        <DropdownMenuLabel>Show Rows</DropdownMenuLabel>
                    <DropdownMenuSeparator />
                    <DropdownMenuRadioGroup
                    // value={position}
                    // onValueChange={setPosition}
                    >
                    <DropdownMenuRadioItem value="10">
                    10
                    </DropdownMenuRadioItem>
                    <DropdownMenuRadioItem value="25">
                    25
                    </DropdownMenuRadioItem>
                    <DropdownMenuRadioItem value="50">
                    50
                    </DropdownMenuRadioItem>
                    </DropdownMenuRadioGroup>
                    </DropdownMenuContent>
                    </DropdownMenu> */}
            <div className="grid gap-5 sm:grid-cols-5 justify-items-center ">
                {loading ? (
                    <ProductsSkeleton length={length} />
                ) : (
                    products.map((product: any) => (
                        <Card
                            key={product.id}
                            className="flex flex-col items-center w-48 transition-shadow duration-300 ease-in-out cursor-pointer 2xl:w-56 hover:shadow-lg"
                        >
                            <a
                                href={route("web.book", product.id)}
                                target="_blank"
                            >
                                <div className="relative">
                                    <img
                                        className="w-48 border-none rounded-t-lg h-52 2xl:w-56 2xl:h-64 object-fit"
                                        src={product.imgUrl}
                                        alt=""
                                    />
                                    <p className="absolute p-1 text-sm font-semibold text-white bg-red-500 rounded-md shadow-sm top-2 right-2">
                                        {product.discount}% off
                                    </p>
                                </div>
                                <CardContent className="w-full px-0 py-2">
                                    <div className="flex items-start justify-center w-11/12 mx-auto">
                                        <p className="2xl:text-lg">
                                            {product.name}
                                        </p>
                                    </div>
                                    <div className="flex items-center justify-center w-11/12 gap-2 mx-auto">
                                        <div className="flex items-center">
                                            <span className="text-sm">
                                                &#8377;
                                            </span>
                                            <span className="text-lg font-bold">
                                                {product.price -
                                                    (product.price *
                                                        product.discount) /
                                                        100}
                                            </span>
                                        </div>
                                        <div className="flex justify-center gap-1">
                                            <span className="text-sm">
                                                MRP:
                                            </span>
                                            <span className="text-sm line-through">
                                                &#8377;{product.price}
                                            </span>
                                        </div>
                                    </div>
                                </CardContent>
                            </a>
                            <CardFooter className="pb-4">
                                <div>
                                    {cart.includes(product.id) ? (
                                        <Button
                                            variant="default"
                                            className="bg-red-500"
                                            size="sm"
                                            onClick={() =>
                                                removeFromCart(product.id)
                                            }
                                        >
                                            Remove from cart
                                        </Button>
                                    ) : (
                                        <Button
                                            variant="default"
                                            size="sm"
                                            onClick={() =>
                                                addToCart(product.id)
                                            }
                                        >
                                            Add to cart
                                        </Button>
                                    )}
                                </div>
                            </CardFooter>
                        </Card>
                    ))
                )}
            </div>
        </>
    );
}
