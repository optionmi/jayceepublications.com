import {
    Pagination,
    PaginationContent,
    PaginationEllipsis,
    PaginationItem,
    PaginationLink,
    PaginationNext,
    PaginationPrevious,
} from "@/components/ui/pagination";

type Props = {
    pages: number;
    page: number;
    length: number;
    setPage: React.Dispatch<React.SetStateAction<number>>;
    setStart: React.Dispatch<React.SetStateAction<number>>;
};

export function ProductsPagination({
    pages,
    page,
    length,
    setPage,
    setStart,
}: Props) {
    const handlePageChange = (newPage: number) => {
        if (page !== newPage) {
            setPage(newPage);
            setStart((prevStart) => prevStart + (newPage - page) * length);
        }
    };

    const handlePreviousPage = () => {
        if (page > 1) {
            handlePageChange(page - 1);
        }
    };

    const handleNextPage = () => {
        if (page < pages) {
            handlePageChange(page + 1);
        }
    };
    return (
        <Pagination>
            <PaginationContent>
                <PaginationItem>
                    <PaginationPrevious
                        href="#"
                        onClick={() => handlePreviousPage()}
                    />
                </PaginationItem>
                {Array.from({ length: pages }, (_, i) => i + 1).map((i) => (
                    <PaginationItem key={i}>
                        <PaginationLink
                            href="#"
                            isActive={i === page}
                            onClick={() => handlePageChange(i)}
                        >
                            {i}
                        </PaginationLink>
                    </PaginationItem>
                ))}
                {/* <PaginationItem>
                    <PaginationEllipsis />
                </PaginationItem> */}
                <PaginationItem>
                    <PaginationNext href="#" onClick={() => handleNextPage()} />
                </PaginationItem>
            </PaginationContent>
        </Pagination>
    );
}
