import { BellIcon, CheckIcon } from "@radix-ui/react-icons";

import { cn } from "@/lib/utils";

import { Button } from "@/components/ui/button";
import {
    Card,
    CardContent,
    CardDescription,
    CardFooter,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import { Switch } from "@/components/ui/switch";
import { Checkbox } from "./ui/checkbox";

type cardData = {
    name: string;
    data: { id: number; name: string; isChecked: boolean }[];
};

type CardProps = React.ComponentProps<typeof Card> & {
    cardData: cardData;
    filters: { [key: string]: any };
    setFilters: any;
    setPage: any;
};

export function SidebarCard({
    className,
    cardData,
    filters,
    setFilters,
    setPage,
    ...props
}: CardProps) {
    function onChangeHandler(
        isChecked: boolean,
        name: string,
        id: number,
        index: number
    ) {
        // console.log(cardData.data[index], { isChecked });
        cardData.data[index].isChecked = isChecked;
        // console.log(cardData.data[index], { isChecked });
        if (isChecked) {
            setFilters((prev: any) => ({
                ...prev,
                [name]: [...(prev[name] || []), id],
            }));
        } else {
            setFilters((prev: any) => ({
                ...prev,
                [name]: prev[name].filter((item: number) => item !== id),
            }));
        }
        setPage(1);
    }

    return (
        <Card className={cn(className)} {...props}>
            <CardHeader>
                <CardTitle>{cardData.name}</CardTitle>
            </CardHeader>
            <CardContent className="flex flex-col gap-3">
                {cardData.data.map((item: any, index: number) => (
                    <div key={item.id} className="flex items-center gap-2">
                        <Checkbox
                            id={cardData.name + item.id}
                            value={item.id}
                            name={cardData.name}
                            checked={item.isChecked}
                            onCheckedChange={(isChecked: boolean) =>
                                onChangeHandler(
                                    isChecked,
                                    cardData.name,
                                    item.id,
                                    index
                                )
                            }
                        />
                        <label
                            htmlFor={cardData.name + item.id}
                            className="font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        >
                            {item.name}
                        </label>
                    </div>
                ))}
            </CardContent>
        </Card>
    );
}
