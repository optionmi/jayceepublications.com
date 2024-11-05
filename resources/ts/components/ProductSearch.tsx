import React, { useState, useEffect, useCallback } from "react";
import { Input } from "./ui/input";
import debounce from "lodash/debounce";

export default function ProductSearch({
    filters,
    setFilters,
    applyFilters,
}: any) {
    const [query, setQuery] = useState(filters.Search);

    // Debounced fetchData function
    const debouncedFetchData = useCallback(
        debounce((searchQuery) => {
            setFilters((prev: any) => {
                applyFilters({
                    ...prev,
                    Search: searchQuery,
                });
                return {
                    ...prev,
                    Search: searchQuery,
                };
            });
        }, 1000),
        []
    );

    function onChangeHandler(e: any) {
        const searchValue = e.target.value;
        setQuery(searchValue);

        if (searchValue.trim() === "") {
            // Reset filters if input is empty
            setFilters((prev: any) => {
                applyFilters({
                    ...prev,
                    Search: "",
                });
                return {
                    ...prev,
                    Search: "",
                };
            });
        } else {
            // Use the debounced function for non-empty input
            debouncedFetchData(searchValue);
        }
    }

    return (
        <div>
            <Input
                type="text"
                placeholder="Search..."
                value={query}
                onChange={onChangeHandler}
            />
        </div>
    );
}
