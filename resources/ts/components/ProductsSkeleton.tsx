import { Skeleton } from "@/components/ui/skeleton";

type Props = {
    length: number;
};

export function ProductsSkeleton({ length }: Props) {
    return (
        <>
            {Array.from({ length: length }, (_, i) => i + 1).map((i) => (
                <div key={i} className="flex flex-col items-center gap-3">
                    <Skeleton className="w-48 rounded-t-lg 2xl:w-56 h-52 2xl:h-64" />
                    <div className="space-y-2">
                        <Skeleton className="h-4 w-36" />
                        <Skeleton className="h-4 w-34" />
                    </div>
                </div>
            ))}
        </>
    );
}
