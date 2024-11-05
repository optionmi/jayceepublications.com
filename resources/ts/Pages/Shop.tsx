import { useEffect, useState } from "react";
import { useSearchParams } from "react-router-dom";
import {
    Card,
    CardContent,
    CardFooter,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import { SidebarCard } from "@/components/SidebarCard";
import ProductTable from "@/components/ProductTable";
import { ProductsPagination } from "@/components/ProductsPagination";
import { Button } from "@/components/ui/button";
import { DialogTrigger } from "@radix-ui/react-dialog";
import { OrderConfirmation } from "@/components/OrderConfirmation";
import { Toaster } from "@/components/ui/sonner";
import ProductSearch from "@/components/ProductSearch";

export default function Shop({ boards, standards, subjects, csrfToken }: any) {
    const [start, setStart] = useState(0);
    const [length, setLength] = useState(10);
    const [pages, setPages] = useState(1);
    const [page, setPage] = useState(1);
    const [loading, setLoading] = useState(false);

    const [cart, setCart] = useState(
        JSON.parse(sessionStorage.getItem("cart")) || []
    );
    const [products, setProducts] = useState([]);

    function addToCart(productId: number) {
        setCart((prevCart) => [...prevCart, productId]);
    }
    function removeFromCart(productId: number) {
        setCart((prev) => prev.filter((item) => item !== productId));
    }

    const [productsCount, setProductsCount] = useState(0);
    const [searchParams, setSearchParams] = useSearchParams({ start, length });

    const [sidbarCards, setSidebarCards] = useState([
        { name: "Board", data: boards },
        { name: "Class", data: standards },
        { name: "Subject", data: subjects },
    ]);

    const [filters, setFilters] = useState({
        Board: searchParams.get("Board")?.split(",") ?? [],
        Class: searchParams.get("Class")?.split(",") ?? [],
        Subject: searchParams.get("Subject")?.split(",") ?? [],
        Search: searchParams.get("Search") ?? "",
    });

    type ParamsType = {
        Board?: string | null;
        Class?: string | null;
        Subject?: string | null;
        start: number;
        length: number;
        Search?: string;
    };
    function applyFilters(filters: any) {
        setLoading(true);
        const newParams: ParamsType = { start, length };
        if (filters.Board.length) newParams.Board = filters.Board.join(",");
        if (filters.Class.length) newParams.Class = filters.Class.join(",");
        if (filters.Subject.length)
            newParams.Subject = filters.Subject.join(",");
        if (filters.Search != "") newParams.Search = filters.Search;
        console.log(filters);

        setSearchParams(() => {
            fetchFilteredData(newParams);
            return newParams;
        });
    }

    useEffect(() => {
        setLoading(true);
        boards = boards.map((board: any) => ({
            id: board.id,
            name: board.name,
            isChecked: filters.Board.includes(board.id.toString()),
        }));
        standards = standards.map((standard: any) => ({
            id: standard.id,
            name: standard.name,
            isChecked: filters.Class.includes(standard.id.toString()),
        }));

        subjects = subjects.map((subject: any) => ({
            id: subject.id,
            name: subject.name,
            isChecked: filters.Subject.includes(subject.id.toString()),
        }));
        setSidebarCards([
            { name: "Board", data: boards },
            { name: "Class", data: standards },
            { name: "Subject", data: subjects },
        ]);
        applyFilters(filters);
        // fetchFilteredData();
    }, []);

    async function fetchFilteredData(searchParams: string) {
        const query = new URLSearchParams(searchParams).toString();
        const response = await fetch(`${route("web.shop.data")}?${query}`); // Fetch based on query params
        const data = await response.json();
        const fetchedProducts = data.data;
        setProducts(fetchedProducts);
        setProductsCount(data.count);
        setPages(Math.ceil(data.count / length));
        setLoading(false);
    }

    function handleEmptyCart() {
        setCart([]);
        sessionStorage.removeItem("cart");
    }

    return (
        <main className="container flex flex-col gap-5 py-10 mx-auto sm:flex-row">
            <Toaster />
            <div className="flex flex-col w-full gap-2 sm:w-1/6">
                {sidbarCards.map((cardData) => (
                    <SidebarCard
                        className="rounded-sm"
                        key={cardData.name}
                        cardData={cardData}
                        filters={filters}
                        setFilters={setFilters}
                        setPage={setPage}
                        applyFilters={applyFilters}
                    />
                ))}
            </div>
            <div className="w-full sm:w-5/6">
                <Card className="p-5 min-h-[calc(100vh-12rem)] flex-col flex gap-5">
                    <CardHeader className="flex flex-col items-center justify-between px-0 sm:px-6 sm:flex-row">
                        <CardTitle className="text-xl">
                            {productsCount} Books
                        </CardTitle>
                        <div className="flex flex-col w-full gap-4 sm:w-auto sm:flex-row">
                            <ProductSearch
                                filters={filters}
                                setFilters={setFilters}
                                applyFilters={applyFilters}
                            />
                            <div className="flex justify-around gap-4">
                                <OrderConfirmation
                                    cart={cart}
                                    setCart={setCart}
                                    products={products}
                                    csrfToken={csrfToken}
                                />
                                {cart.length > 0 && (
                                    <Button
                                        className="text-white bg-red-600 "
                                        variant={"outline"}
                                        onClick={handleEmptyCart}
                                    >
                                        Empty Cart ({cart.length})
                                    </Button>
                                )}
                            </div>
                        </div>
                    </CardHeader>
                    <CardContent className="p-0">
                        <ProductTable
                            products={products}
                            length={length}
                            loading={loading}
                            cart={cart}
                            addToCart={addToCart}
                            removeFromCart={removeFromCart}
                        />
                    </CardContent>
                    {pages > 1 && (
                        <CardFooter>
                            <ProductsPagination
                                pages={pages}
                                page={page}
                                length={length}
                                setPage={setPage}
                                setStart={setStart}
                            />
                        </CardFooter>
                    )}
                </Card>
            </div>
        </main>
    );
}
