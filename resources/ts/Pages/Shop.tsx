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

export default function Shop({ boards, standards, subjects, csrfToken }: any) {
    const [start, setStart] = useState(0);
    const [length, setLength] = useState(10);
    const [pages, setPages] = useState(1);
    const [page, setPage] = useState(1);
    const [loading, setLoading] = useState(false);

    const [cart, setCart] = useState([]);
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
    });

    type ParamsType = {
        Board?: string | null;
        Class?: string | null;
        Subject?: string | null;
        start: string;
        length: string;
    };
    const applyFilters = () => {
        const newParams: ParamsType = { start, length };
        if (filters.Board.length) {
            newParams.Board = filters.Board.join(",");
            // setSidebarCards(
            //     sidbarCards.map((card) => {
            //         if (card.name === "Board") {
            //             return {
            //                 ...card,
            //                 data: card.data.map((board: any) => ({
            //                     id: board.id,
            //                     name: board.name,
            //                     isChecked: filters.Board.includes(
            //                         board.id.toString()
            //                     ),
            //                 })),
            //             };
            //         }
            //         return card;
            //     })
            // );
        }
        if (filters.Class.length) newParams.Class = filters.Class.join(",");
        if (filters.Subject.length)
            newParams.Subject = filters.Subject.join(",");

        setSearchParams(newParams);
    };

    useEffect(() => {
        setLoading(true);
        // boards = boards.map((board: any) => ({
        //     id: board.id,
        //     name: board.name,
        //     isChecked: filters.Board.includes(board.id.toString()),
        // }));
        // standards = standards.map((standard: any) => ({
        //     id: standard.id,
        //     name: standard.name,
        //     isChecked: filters.Board.includes(standard.id.toString()),
        // }));

        // subjects = subjects.map((subject: any) => ({
        //     id: subject.id,
        //     name: subject.name,
        //     isChecked: filters.Board.includes(subject.id.toString()),
        // }));
        applyFilters();
        fetchFilteredData();
    }, [filters, page, searchParams]);

    const fetchFilteredData = async () => {
        const query = new URLSearchParams(searchParams).toString();
        const response = await fetch(`${route("web.shop.data")}?${query}`); // Fetch based on query params
        const data = await response.json();
        const fetchedProducts = data.data;
        setProducts(fetchedProducts);
        setProductsCount(data.count);
        setPages(Math.ceil(data.count / length));
        setLoading(false);
    };

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
                    />
                ))}
            </div>
            <div className="w-full sm:w-5/6">
                <Card className="p-5 min-h-[calc(100vh-12rem)] flex-col flex gap-5">
                    <CardHeader className="flex flex-row items-center justify-between">
                        <CardTitle className="text-xl">
                            {productsCount} Books
                        </CardTitle>
                        <OrderConfirmation
                            cart={cart}
                            setCart={setCart}
                            products={products}
                            csrfToken={csrfToken}
                        />
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
